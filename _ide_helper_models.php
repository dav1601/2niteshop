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
 */
	class Address extends \Eloquent {}
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
 */
	class Banners extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bills
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $detail
 * @property int $total
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $p
 * @property string $d
 * @property string $w
 * @property string $payment
 * @property string $note
 * @property int $phone
 * @property int $status
 * @property int $paid
 * @property string $time_order
 * @property int $d_ord
 * @property int $m_ord
 * @property int $y_ord
 * @property string|null $time_s
 * @property int|null $d_s
 * @property int|null $m_s
 * @property int|null $y_s
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bills query()
 */
	class Bills extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blogs
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string $content
 * @property string $desc
 * @property string $img
 * @property int $cat_id
 * @property int|null $cat_sub_id
 * @property int $users_id
 * @property int $views
 * @property string $author
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blogs query()
 */
	class Blogs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bundled
 *
 * @property int $id
 * @property string|null $bundled_skin
 * @property string|null $bundled_accessory
 * @property int $cat_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BundledFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bundled newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundled newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bundled query()
 */
	class Bundled extends \Eloquent {}
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
 */
	class CatGame extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property string|null $keywords
 * @property int $parent_id
 * @property string $slug
 * @property string|null $img
 * @property string|null $icon
 * @property int $level
 * @property int|null $is_game
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 */
	class Category extends \Eloquent {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customers query()
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Insurance query()
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
 * @property int|null $date_s
 * @property int|null $d_s
 * @property int|null $m_s
 * @property int|null $y_s
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orders query()
 */
	class Orders extends \Eloquent {}
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
 */
	class Pages extends \Eloquent {}
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
 */
	class Policy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreOrder
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $products_id
 * @property string $products_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status 0: Chưa xử Lý , 1:Đã xử lý
 * @property int $deposit 0: Chưa cọc , 1:Đã cọc , 2:Rút cọc
 * @property string|null $delivery_time Thời gian nhận hàng
 * @property int $delivered 0:Chưa lấy hàng , 1: Đã lấy hàng , 2:Rút cọc
 * @property int|null $price
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreOrder query()
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
 */
	class Producer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Products
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $des
 * @property string|null $keywords
 * @property int $price
 * @property int|null $historical_cost
 * @property string $content
 * @property string|null $info
 * @property string|null $insurance
 * @property string|null $policy
 * @property string $model
 * @property string|null $video
 * @property string|null $banner
 * @property string|null $banner_link
 * @property string $main_img
 * @property string $sub_img
 * @property string $type
 * @property string|null $sub_type
 * @property int $cat_id
 * @property string $cat_name
 * @property int|null $cat_2_id
 * @property int|null $cat_2_sub
 * @property int $sub_1_cat_id
 * @property string $sub_1_cat_name
 * @property int|null $sub_2_cat_id
 * @property string|null $sub_2_cat_name
 * @property int|null $op_sub_1_id
 * @property string|null $op_sub_1_name
 * @property int|null $op_sub_2_id
 * @property string|null $op_sub_2_name
 * @property int $producer_id
 * @property string $producer_slug
 * @property string|null $cat_game_id
 * @property string|null $option_color
 * @property string|null $option
 * @property int $stock
 * @property int $new
 * @property int|null $usage_stt
 * @property int|null $num_orders
 * @property int $highlight
 * @property string $author
 * @property int $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\gllProducts[] $gll
 * @property-read int|null $gll_count
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
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
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RelatedPosts
 *
 * @property int $id
 * @property string $posts
 * @property int $product_id
 * @property int $cat_id
 * @property string $for
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedPosts query()
 */
	class RelatedPosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RelatedProducts
 *
 * @property int $id
 * @property string $products
 * @property int|null $product_id
 * @property int|null $blog_id
 * @property string $for
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelatedProducts query()
 */
	class RelatedProducts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slides
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $link
 * @property int $index
 * @property int|null $status
 * @property string $author_post
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slides query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistics query()
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
 * @property string $time_add
 * @property string $time_end
 * @property int|null $done
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todos query()
 */
	class Todos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $provider_id
 * @property string|null $provider
 * @property int|null $ban
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $address
 * @property-read int|null $address_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
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
 */
	class Ward extends \Eloquent {}
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
 * @property-read \App\Models\Products|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|gllProducts query()
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
 * @property int|null $cat_2
 * @property string $cat
 * @property string|null $option
 * @property string|null $color
 * @property string|null $tab
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|showHome query()
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
 */
	class typeProduct extends \Eloquent {}
}

