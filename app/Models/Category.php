<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
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
        'level',
        'is_game'
    ];
    public static function tree()
    {
        $array_except = array(145, 141);
        $allCategories = Category::whereNotIn('id', $array_except)->get();
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
    static function OneCatTree($id)
    {
        $allCategories = Category::where('id', '!=', 145)->get();
        $category = Category::where('id', '=', $id)->get();
        self::formatOneTree($category, $allCategories);
        return $category;
    }
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
        $allCategories = Category::where('id', '!=', 145)->get();
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
    static function createUriCategory($categories , $implode="/")
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
        return $this->hasMany('App\Models\ProductCategories', 'category_id');
    }
}
