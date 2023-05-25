<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $desc
 * @property string|null $keywords
 * @property int $parent_id
 * @property string $slug
 * @property string|null $img
 * @property string|null $icon
 * @property int|null $position
 * @property int $level
 * @property int $active
 * @property string $type
 * @property int|null $is_game
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\bundled_accessory_cat> $bundled_accessory
 * @property-read int|null $bundled_accessory_count
 * @property-read \App\Models\bundled_skin_cat|null $bundled_skin
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RelatedPosts> $related_blogs
 * @property-read int|null $related_blogs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'title',
        'desc',
        'keywords',
        'parent_id',
        'slug',
        'img',
        'icon',
        'position',
        'level',
        'is_game',
        'active',
        'category-game'
    ];
    public static function tree($except = true)
    {
        $categoryModel = new Category();
        if ($except) {
            $categoryModel = $categoryModel->where('active', "!=", 0);
        }
        // $array_except =  $except ? array(145, 141) : [];
        $allCategories = $categoryModel->orderBy('position', 'ASC')->get();
        $rootCategories = $allCategories->where('parent_id', '=', 0);
        self::formatTree($rootCategories, $allCategories);
        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();
            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }
    // //////////////////////
    // static function OneCatTree($id)
    // {
    //     $allCategories = Category::where('id', '!=', 145)->get();
    //     $category = Category::where('id', '=', $id)->get();
    //     self::formatOneTree($category, $allCategories);
    //     return $category;
    // }
    private static function formatOneTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();
            if ($category->children->isNotEmpty()) {
                self::formatOneTree($category->children, $allCategories);
            }
        }
    }
    // //////////////
    static function ParentTree($id)
    {
        $allCategories = Category::where('id', '!=', 145)->orderBy('position', 'ASC')->get();
        $category = Category::where('id', '=', $id)->get();
        self::formatParentTree($category, $allCategories);
        return $category;
    }
    // //////////////////////////////////
    private static function formatParentTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            if ($category->parent_id != 0) {
                $category->parent = $allCategories->where('id', $category->parent_id)->values();
                if ($category->parent->isNotEmpty()) {
                    self::formatParentTree($category->parent, $allCategories);
                }
            }
        }
    }
    // /////////////
    static function treeUriParent($categories)
    {
        $uri = [];
        foreach ($categories as $category) {
            array_push($uri, $category->slug);
            if (isset($category->parent)) {
                $parent = self::treeUriParent($category->parent);
                $uri = array_merge($uri, $parent);
            }
        }
        return $uri;
    }
    // tạo đƯờng dẫn thư mục từ gốc đến cha con cho category slug
    static function createUriCategory($categories, $implode = "/")
    {
        $uri = self::treeUriParent($categories);
        return implode($implode, collect($uri)->reverse()->toArray());
    }
    public function isChild(): bool
    {
        return $this->parent_id !== 0;
    }
    public function related_blogs()
    {
        return $this->hasMany('App\Models\RelatedPosts', 'cat_id')->orderBy('posts', 'DESC');
    }
    public function bundled_skin()
    {
        return $this->hasOne('App\Models\bundled_skin_cat', 'cat_id');
    }
    public function bundled_accessory()
    {
        return $this->hasMany('App\Models\bundled_accessory_cat', 'cat_id');
    }
    public function products()
    {
        return $this->belongsToMany("App\Models\Products", 'product_categories', 'category_id', 'products_id');
    }
}
