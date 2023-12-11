-database:
--page builder (sidebar , slug ,title , type: (full , component , template) , data (section + column + package))

chỉ cần 1 bản pagebuilder là xong
--------------------------
--section (id , pbid , ord , payload {
container ,
background ,
class
} , layout , type = "section" )
--------------------------

--column (id , sid , ord , type="column" , payload(package))

--package (type , cid , data)
--------------------------
-design data:
data {
text: {
class:
content
type
};
image: {
type
content
class
options: {
href: ""
}
};
video: {
class
content
type
} ,
products: {
class ,
content: {

}
}
tab {
content: "" ,
class: ""
type: tab
options {
type: 'product/category' ,
color: ""
}
}
slides {
content: "" ,
class: ""
type: tab
options {
type: 'images/yt' (1 select type (làm add image giống chat app) , 2 button: add-link (component file -> remove , sort) )
,
color: ""
}
}
carouse: {
content:[
{
value: "";
link: "";

}
]
class:
type
options:{}
},

}

section/column/package

game danh muc -> game hot + game moi trong tab package
tab -> products , danh muc , color
slide images/video (number , type)
tách modal package editor ra riêng dùng push content khi edit
{{-- 12/4/23 --}}
làm phần add tab
làm tiếp phần page builder chia layout từng phần cho user product.... , làm responsive cho pagebuilder , làm edit cho
column
ưu tiên: làm style
tab cho các package (thêm vào setting column)
(12/4: backuped)
tạo full width cho column section
lam packages banner (max , min item responsive)
setting column
{{-- ----- --}}
làm package video slide + build home build banners category + connection 2 cái đó + làm api (làm nốt phần tabs(remove)
với render gallery video)
{{-- =================== --}}
design upload
tạo 1 table media và vào mục study xem video
Model -> Collection
->
chuyen fix media:
category (checked) , config info (checked) , blog (checked) , avatar
{{-- --------- --}}
list uuid , lam lai lazyload , fix media product , cai nao auth thi bam no ra ......
{{-- --- --}}
group options product: {
    mau sac , bao hanh , phien ban .....
}
// "vue": "^2.6.12",
// "vue-loader": "^15.9.7",
// "vue-template-compiler": "^2.6.12"
{{-- save menu --}}
<li class="module">
    <a class="{{ $module == 'dashboard' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#dashboard" aria-expanded="true" aria-controls="dashboard">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="dashboard"
        class="module_drop {{ $module == 'dashboard' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('dashboard') }}"
                    class="{{ $route == 'dashboard' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Dashboard 2NITESHOP</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('pgb.index') }}"
                    class="{{ $route == 'pgb.index' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Quản Lý Page Builder</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('pgb.create.or.edit') }}"
                    class="{{ $route == 'pgb.create.or.edit' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Page Builder</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('add_cofhome_view') }}"
                    class="{{ $route == 'add_cofhome_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Config Trang Chủ</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('add_cofinfor_view') }}"
                    class="{{ $route == 'add_cofinfor_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Config Thông Tin</span>
                </a>
            </li>

        </ul>
    </div>
</li>
{{-- -------------------- --}}
<li class="module">
    <a class="{{ $module == 'category' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#product" aria-expanded="true" aria-controls="product">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-box"></i>
                <span>Sản Phẩm</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="product"
        class="module_drop {{ $module == 'category' ? 'show' : '' }} {{ $module == 'prd' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('add_product_view') }}"
                    class="{{ $route == 'add_product_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm Sản Phẩm</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('product_block_view', ['type' => 'add']) }}"
                    class="{{ $route == 'product_block_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm Block Sản Phẩm</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('category_block_view', ['type' => 'add']) }}"
                    class="{{ $route == 'category_block_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm Block Danh Mục</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('show_product') }}"
                    class="{{ $route == 'show_product' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Sản Phẩm</span>
                </a>
            </li>
            <li class="item">
                <a href="#"
                    class="{{ $route == 'product_view_edit' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Chỉnh Sửa Sản Phẩm</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('cat') }}"
                    class="{{ $route == 'cat' ? 'route_active' : '' }} {{ $route == 'edit_cat' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Mục Sản Phẩm</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('prdcer') }}"
                    class="{{ $route == 'prdcer' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Nhà Sản Xuất</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('game') }}"
                    class="{{ $route == 'game' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Mục Game</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('insurance') }}"
                    class="{{ $route == 'insurance' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Chính Sách Bảo Hành</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('plc') }}"
                    class="{{ $route == 'plc' ? 'route_active' : '' }} {{ $route == 'edit_plc' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Các Chính Sách Của Shop</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- ------------------------------------ --}}
<li class="module">
    <a class="{{ $module == 'users' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#user" aria-expanded="true" aria-controls="user">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="user"
        class="module_drop {{ $module == 'users' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('add_user') }}"
                    class="{{ $route == 'add_user' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm User</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('show_user') }}"
                    class="{{ $route == 'show_user' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Người Dùng</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('add_roles') }}"
                    class="{{ $route == 'add_roles' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Tạo Role User</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('add_permissions') }}"
                    class="{{ $route == 'add_permissions' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Tạo Quyền User</span>
                </a>
            </li>

            <li class="item">
                <a href="{{ route('admin_profile', ['id' => Auth::id()]) }}"
                    class="{{ $route == 'admin_profile' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thông Tin Tài Khoản</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('setting_profile', ['id' => Auth::id()]) }}"
                    class="{{ $route == 'setting_profile' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Cài Đặt Thông Tin Tài Khoản</span>
                </a>
            </li>

        </ul>
    </div>
</li>
{{-- ------------------------------------ --}}
<li class="module">
    <a class="{{ $module == 'orders' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#order" aria-expanded="true" aria-controls="order">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-receipt"></i>
                <span>Đơn Hàng</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="order"
        class="module_drop {{ $module == 'orders' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('show_orders') }}"
                    class="{{ $route == 'show_orders' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Đơn Hàng</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('customers') }}"
                    class="{{ $route == 'customers' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Khách Hàng</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('show_preOrders') }}"
                    class="{{ $route == 'show_preOrders' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Đặt Hàng Trước</span>
                </a>
            </li>
            <li class="item">
                <a href="#"
                    class="{{ $route == 'detail_order' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Chi Tiết Đơn Hàng</span>
                </a>
            </li>
            <li class="item">
                <a href="#"
                    class="{{ $route == 'update_preOrders' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Chi Tiết Đơn Đặt Hàng</span>
                </a>
            </li>

        </ul>
    </div>
</li>

{{-- ------------------------------------ --}}
<li class="module">
    <a class="{{ $module == 'blog' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#blog" aria-expanded="true" aria-controls="blog">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-blog"></i>
                <span>Bài Viết</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="blog"
        class="module_drop {{ $module == 'blog' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('add_blog_view') }}"
                    class="{{ $route == 'add_blog_view' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm Bài Viết</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('show_blogs') }}"
                    class="{{ $route == 'show_blogs' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Sách Bài Viết</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('category_blog') }}"
                    class="{{ $route == 'category_blog' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Danh Mục Bài Viết</span>
                </a>
            </li>
            {{-- <li class="item">
                <a href="{{ route('add_related_view') }}"
                    class="{{ $route == 'add_related_view'?'route_active':''  }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Thêm Bài Viết Liên Quan</span>
                </a>
            </li> --}}

        </ul>
    </div>
</li>
{{-- ------------------------------------ --}}
<li class="module">
    <a class="{{ $module == 'banner' ? 'module_active' : '' }}" data-toggle="collapse"
        data-target="#banner" aria-expanded="true" aria-controls="banner">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fab fa-slideshare"></i>
                <span>Slide Và Banner</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="banner"
        class="module_drop {{ $module == 'banner' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            {{-- <li class="item">
                <a href="{{ route('banner_view_add') }}"
                    class="{{ $route == 'banner_view_add' ? 'route_active' : '' }} {{ $route == 'banner_view_edit' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Quản Lý Banner</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('slide_view_add') }}"
                    class="{{ $route == 'slide_view_add' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Quản Lý Slide</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('ads_view_add') }}"
                    class="{{ $route == 'ads_view_add' ? 'route_active' : '' }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Quản Lý ADS</span>
                </a>
            </li> --}}
        </ul>
    </div>
</li>

{{-- ------------------------------------ --}}
<li class="module">
    <a class="" data-toggle="collapse" data-target="#page" aria-expanded="true"
        aria-controls="page">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fas fa-pager"></i>
                <span>Trang</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="page"
        class="module_drop {{ $module == 'pages' ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            <li class="item">
                <a href="{{ route('manage_pages') }}">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Quản Lý Trang</span>
                </a>
            </li>
            <li class="item">
                <a href="#">
                    <i class="fas fa-long-arrow-alt-right"></i>
                    <span>Chỉnh Sửa Trang</span>
                </a>
            </li>
        </ul>
    </div>
</li>
