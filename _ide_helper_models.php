<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string $prov
 * @property int $prov_id
 * @property string $dist
 * @property int $dist_id
 * @property string $ward
 * @property int $ward_id
 * @property string $detail
 * @property string|null $map
 * @property int $def 1: Default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @mixin \Eloquent
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ads
 *
 * @property int $id
 * @property string $img
 * @property string $link
 * @property string $type
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads query()
 * @mixin \Eloquent
 */
	class Ads extends \Eloquent {}
}

namespace App\Models\Api{
/**
 * App\Models\Api\ApiAdmin
 *
 * @property int $id
 * @property int $users_id
 * @property int|null $partner_id
 * @property string $token_api
 * @property int|null $security_code
 * @property string|null $requested_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAdmin query()
 * @mixin \Eloquent
 */
	class ApiAdmin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banners
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $img
 * @property int $index
 * @property string $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Banners newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banners newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banners query()
 * @mixin \Eloquent
 */
	class Banners extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bills
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills query()
 * @mixin \Eloquent
 */
	class Bills extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlockCategory
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockCategory query()
 * @mixin \Eloquent
 */
	class BlockCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BlockProduct
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $is_list
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PrdRelaBlock> $relaPrd
 * @property-read int|null $rela_prd_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockProduct query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PrdRelaBlock> $relaPrd
 */
	class BlockProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blogs
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string|null $content
 * @property string $type_content text-editor and page builder
 * @property string $desc
 * @property string $img
 * @property int $cat_id
 * @property int|null $cat_sub_id
 * @property int $users_id
 * @property int $views
 * @property \App\Models\User $author
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CatBlog|null $category
 * @property-read \App\Models\CatBlog|null $category_sub
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PgbBlog> $pgbs
 * @property-read int|null $pgbs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs exclude($value = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PgbBlog> $pgbs
 */
	class Blogs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CatBlog
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatBlog query()
 * @mixin \Eloquent
 */
	class CatBlog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CatGame
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CatGame query()
 * @mixin \Eloquent
 */
	class CatGame extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\bundled_accessory_cat> $bundled_accessory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $products
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RelatedPosts> $related_blogs
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryRelaBlock
 *
 * @property int $id
 * @property int $category_id
 * @property int $block_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlockCategory $block
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRelaBlock query()
 * @mixin \Eloquent
 */
	class CategoryRelaBlock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comments
 *
 * @property int $id
 * @property int $blog_id
 * @property string $name
 * @property int|null $id_cmt
 * @property int $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments query()
 * @mixin \Eloquent
 */
	class Comments extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @mixin \Eloquent
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customers
 *
 * @property int $id
 * @property int|null $users_id
 * @property string $name
 * @property int|null $wallet
 * @property string|null $phone
 * @property string $email
 * @property int|null $vip
 * @property string|null $p
 * @property string|null $d
 * @property string|null $w
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers withoutTrashed()
 * @mixin \Eloquent
 */
	class Customers extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property int $id
 * @property string|null $_name
 * @property string|null $_prefix
 * @property int|null $_province_id
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @mixin \Eloquent
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string $start
 * @property string $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FL
 *
 * @property int $id
 * @property int $user_id
 * @property int $fl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FL newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FL newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FL query()
 * @mixin \Eloquent
 */
	class FL extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FixMenu
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FixMenu query()
 * @mixin \Eloquent
 */
	class FixMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Insurance
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int|null $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance query()
 * @mixin \Eloquent
 */
	class Insurance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Orders
 *
 * @property int $id
 * @property string $name
 * @property string $cart
 * @property int|null $users_id
 * @property int $total
 * @property string $email
 * @property string $address
 * @property string $prov
 * @property string $dist
 * @property string|null $ward
 * @property string $payment
 * @property string|null $note
 * @property string $phone
 * @property int|null $status
 * @property int|null $paid
 * @property int $d
 * @property int $m
 * @property int $y
 * @property string|null $date_s
 * @property int|null $d_s
 * @property int|null $m_s
 * @property int|null $y_s
 * @property string|null $date_ship
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\OrdersFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders query()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders withoutTrashed()
 * @mixin \Eloquent
 */
	class Orders extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PageBuilder
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string $type full,template,component
 * @property string $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageBuilder withoutTrashed()
 * @mixin \Eloquent
 */
	class PageBuilder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pages
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string $content
 * @property int $users_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages query()
 * @mixin \Eloquent
 */
	class Pages extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PgbBlog
 *
 * @property int $id
 * @property int $blogs_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbBlog query()
 * @mixin \Eloquent
 */
	class PgbBlog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PgbRelaCategory
 *
 * @property int $id
 * @property int $category_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaCategory query()
 * @mixin \Eloquent
 */
	class PgbRelaCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PgbRelaHome
 *
 * @property int $id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaHome query()
 * @mixin \Eloquent
 */
	class PgbRelaHome extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PgbRelaProduct
 *
 * @property int $id
 * @property int $products_id
 * @property int $pgb_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageBuilder $pgb_data
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PgbRelaProduct query()
 * @mixin \Eloquent
 */
	class PgbRelaProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Policy
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $icon
 * @property int|null $position
 * @property int|null $fullset
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Policy query()
 * @mixin \Eloquent
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PrdRelaBlock
 *
 * @property int $id
 * @property int $products_id
 * @property int $block_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlockProduct $block
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlock query()
 * @mixin \Eloquent
 */
	class PrdRelaBlock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PrdRelaBlog
 *
 * @property int $products_id
 * @property int $blogs_id
 * @property-read \App\Models\Blogs $blogs
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrdRelaBlog query()
 * @mixin \Eloquent
 */
	class PrdRelaBlog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreOrder
 *
 * @property int $id
 * @property string $name_cus
 * @property string $phone
 * @property int $products_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status 0: Chưa xử Lý , 1:Đã xử lý
 * @property int $status_product 0: Hàng chưa có 1: Hàng đã về tới shop
 * @property int $deposit 0: Chưa cọc , 1:Đã cọc , 2:Rút cọc
 * @property string|null $delivery_time Thời gian nhận hàng
 * @property int $delivery_status 0:Chưa lấy hàng , 1: Đã lấy hàng , 2:Huỷ
 * @property int|null $price
 * @property string|null $price_deposit
 * @property string|null $arrived_time
 * @method static \Database\Factories\PreOrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder query()
 * @mixin \Eloquent
 */
	class PreOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Producer
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Producer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producer query()
 * @mixin \Eloquent
 */
	class Producer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategories
 *
 * @property int $id
 * @property int $products_id
 * @property int $category_id
 * @property string|null $category_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $cat
 * @property-read int|null $cat_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $product
 * @property-read int|null $product_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategories query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $cat
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Products> $product
 */
	class ProductCategories extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductIns
 *
 * @property int $id
 * @property int $products_id
 * @property int $ins_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Insurance $ins
 * @property-read \App\Models\Products|null $products
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductIns query()
 * @mixin \Eloquent
 */
	class ProductIns extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductPlc
 *
 * @property int $id
 * @property int $products_id
 * @property int $plc_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Policy $plc
 * @property-read \App\Models\Products $products
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPlc query()
 * @mixin \Eloquent
 */
	class ProductPlc extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Products
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $des
 * @property string|null $keywords
 * @property int $price
 * @property int|null $discount
 * @property int|null $historical_cost
 * @property string $content
 * @property string|null $info
 * @property string|null $insurance
 * @property string $model
 * @property string|null $video
 * @property string|null $banner
 * @property string|null $banner_link
 * @property string $main_img
 * @property string $sub_img
 * @property string|null $bg
 * @property string $type
 * @property string|null $sub_type
 * @property int $producer_id
 * @property string $producer_slug
 * @property string|null $cat_game_id
 * @property int $stock
 * @property int $new
 * @property int|null $usage_stt
 * @property int|null $num_orders
 * @property int $highlight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlockProduct> $blocks
 * @property-read int|null $blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Products> $bundled_products
 * @property-read int|null $bundled_products_count
 * @property-read \App\Models\CatGame|null $cat_game
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\gllProducts> $gll
 * @property-read int|null $gll_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Insurance> $ins
 * @property-read int|null $ins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Policy> $policies
 * @property-read int|null $policies_count
 * @property-read \App\Models\Producer $producer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blogs> $related_blogs
 * @property-read int|null $related_blogs_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Products exclude($value = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Products withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlockProduct> $blocks
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Products> $bundled_products
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\gllProducts> $gll
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Insurance> $ins
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Policy> $policies
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blogs> $related_blogs
 */
	class Products extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Province
 *
 * @property int $id
 * @property string|null $_name
 * @property string|null $_code
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PwRsSms
 *
 * @property string $phone
 * @property int $code
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PwRsSms query()
 * @mixin \Eloquent
 */
	class PwRsSms extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RelatedPosts
 *
 * @property int $id
 * @property string $posts
 * @property int|null $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blogs|null $infoBlog
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts query()
 * @mixin \Eloquent
 */
	class RelatedPosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RelatedProducts
 *
 * @property int $id
 * @property int|null $products_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Products|null $products
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts query()
 * @mixin \Eloquent
 */
	class RelatedProducts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SectionHome
 *
 * @property int $id
 * @property int $show_id
 * @property int $section
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionHome query()
 * @mixin \Eloquent
 */
	class SectionHome extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShoppingCart
 *
 * @property string $identifier
 * @property string $instance
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart query()
 * @mixin \Eloquent
 */
	class ShoppingCart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slides
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $link
 * @property int|null $index
 * @property int|null $status
 * @property int|null $users_id
 * @property string|null $author_post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides query()
 * @mixin \Eloquent
 */
	class Slides extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Statistics
 *
 * @property int $id
 * @property int $day
 * @property int $month
 * @property int $year
 * @property int $total_day
 * @property int|null $total_cost
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics withoutTrashed()
 * @mixin \Eloquent
 */
	class Statistics extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Todos
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int|null $done
 * @property string $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos query()
 * @mixin \Eloquent
 */
	class Todos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int|null $security_code
 * @property string|null $avatar
 * @property string|null $provider_id
 * @property string|null $provider
 * @property int|null $ban
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $address
 * @property-read int|null $address_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Orders> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todos> $todos
 * @property-read int|null $todos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Orders> $orders
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todos> $todos
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ward
 *
 * @property int $id
 * @property string $_name
 * @property string|null $_prefix
 * @property int|null $_province_id
 * @property int|null $_district_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ward query()
 * @mixin \Eloquent
 */
	class Ward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\bundled_accessory_cat
 *
 * @property int $id
 * @property int $products_id
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_accessory_cat query()
 * @mixin \Eloquent
 */
	class bundled_accessory_cat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\bundled_product
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_product query()
 * @mixin \Eloquent
 */
	class bundled_product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\bundled_skin_cat
 *
 * @property int $id
 * @property int $skin_cat_id
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bundled_skin_cat query()
 * @mixin \Eloquent
 */
	class bundled_skin_cat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\gllCat
 *
 * @property int $id
 * @property string $path
 * @property string $link
 * @property int $cate_id
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllCat query()
 * @mixin \Eloquent
 */
	class gllCat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\gllProducts
 *
 * @property int $id
 * @property string $link
 * @property int $products_id
 * @property int $size
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Products $product
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts query()
 * @mixin \Eloquent
 */
	class gllProducts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\infoAdmin
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $biography
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $city
 * @property string|null $d
 * @property string|null $w
 * @property string|null $facebook
 * @property string|null $zalo
 * @property string|null $twitter
 * @property string|null $github
 * @property string|null $instagram
 * @property string|null $linkedIn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|infoAdmin query()
 * @mixin \Eloquent
 */
	class infoAdmin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\showHome
 *
 * @property int $id
 * @property string $name
 * @property string $main_link
 * @property string|null $main_img
 * @property string|null $use_link
 * @property string|null $use_img
 * @property string|null $instruct_link
 * @property string|null $instruct_img
 * @property string|null $access_link
 * @property string|null $access_img
 * @property string|null $fix_link
 * @property string|null $fix_img
 * @property int|null $cat_digital
 * @property string|null $color
 * @property string|null $tab
 * @property int|null $position
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SectionHome> $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SectionHome> $sections
 */
	class showHome extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\typeProduct
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|typeProduct query()
 * @mixin \Eloquent
 */
	class typeProduct extends \Eloquent {}
}

