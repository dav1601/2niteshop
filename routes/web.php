<?php

use App\Events\common;
use App\Events\TestEvent;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Nette\Utils\Arrays;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('test/realtime', function () {

    return event(new TestEvent("1"));
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('update_api', 'HomeController@api');
Route::get('testview', 'TestController@index')->name("view_test");
Route::post('test', 'TestController@handle')->name('test');
Route::post('navi_login', 'ClientLoginController@login')->name('navi_login');
Route::get('products/{slug}', 'ClientProductsController@detail_product')->name('detail_product');
Route::get('products/{parent_1?}/{slug}', 'ClientProductsController@detail_product')->name('detail_product_2');
Route::get('products/{parent_1?}/{parent_2}/{slug}', 'ClientProductsController@detail_product')->name('detail_product_3');
Route::post("product/get_component", 'ClientProductsController@getComponent')->name('prd.component');
Route::get('pages/{slug}', 'ClientPageController@index')->name('detail_page');
Route::get('producer/{slug}', 'ClientProductsController@producer')->name('producer');

Route::get('category/{slug}', 'ClientProductsController@index')->name('index_product');
Route::get('category/{parent_1}/{slug}', 'ClientProductsController@index')->name('index_product_1');
Route::get('category/{parent_1}/{parent_2}/{slug}', 'ClientProductsController@index')->name('index_product_2');

Route::get('tin-tuc/{cat?}', 'ClientBlogController@index')->name('blog');
Route::get('tin-tuc/{cat}/{slug}', 'ClientBlogController@detail')->name('detail_blog');
Route::get('search', 'HomeController@search_main')->name('search_main');
Route::post('search_main', 'HomeController@search_main_ajax')->name('search_main_ajax');
Route::post('pre-order', 'HomeController@pre_order')->name('pre_order');
Route::prefix('ajax/')->group(function () {
    Route::post('load__chart', 'AdminAjaxDashBoardController@load__chart')->name('load__chart');
    Route::post('auth/load/template', 'ClientLoginController@load_auth_template')->name('auth.template');
    Route::post('auth/register', [RegisterController::class, 'ajaxRegister'])->name('ajax.auth.register');
});
Route::post('crawler', 'AdminProductController@crawler')->name('crawler');
Route::get('minify', 'HomeController@minify')->name('minify');

Route::middleware(['auth'])->group(function () {
    Route::prefix('user/')->group(function () {
        Route::prefix('profile/')->group(function () {
            Route::get('/', 'ClientUserController@profile')->name('profile');
            Route::post('hanle_edit_profile/{id}', 'ClientUserController@hanle_edit_profile')->name('hanle_edit_profile');
            Route::post('ajax__avatar', 'ClientUserController@ajax__avatar')->name('ajax__avatar');
            Route::post('ajax__avatar__delete', 'ClientUserController@ajax__delete__avatar')->name('ajax__avatar__delete');
        });
        Route::prefix('address/')->group(function () {
            Route::get('/', 'ClientUserController@address')->name('address');
            Route::post('ajax__address', 'ClientUserController@ajax__address')->name('ajax__address');
        });
        Route::get('purchase{type?}', 'ClientUserController@purchase')->name('purchase');
        Route::post('ajax__order', 'ClientUserController@ajax__order')->name('ajax__order');
        Route::post('ajax__order_search', 'ClientUserController@ajax__order_search')->name('ajax__order_search');
    });
});

Route::prefix('cart/')->group(function () {
    Route::get('show', 'CartController@show')->name('show_cart');
    Route::post('add_cart', 'CartController@handle_cart')->name('add_cart');
    Route::get('checkout', 'CartController@checkout')->name('checkout');
    Route::post('checkout_handle', 'CartController@handle_checkout')->name('handle_checkout');
    Route::get('checkout_s', 'CartController@checkout_s')->name('checkout_s');
});

Route::prefix('ajax/')->group(function () {
    Route::post('format', 'ClientProductsController@format')->name('format');
    Route::post('set_cookie', 'OptionController@set_cookie')->name('set_cookie');
    Route::post('set_nsp', 'OptionController@set_nsp')->name('set_nsp');
    Route::post('change_address', 'CartController@change_address')->name('change_address');
    Route::post('change_address_2', 'AdminOrderController@change_address')->name('change_address_2');
    Route::prefix('category/')->group(function () {
        Route::post('index_ajax', 'ClientProductsController@index_ajax')->name('index_ajax');
    });
    Route::post('loadDataQuickView', 'ClientProductsController@loadDataQuickView')->name('loadDataQuickView');
    Route::post('search', 'HomeController@search')->name('search');
    Route::post('render_skeleton', 'ClientProductsController@render_skeleton')->name('render_skeleton_product');
});

Route::prefix('login/social/')->group(function () {
    Route::get('google', 'Auth\LoginController@redirectToGoogle')->name('login_google');
    Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback')->name('handle_login_google');
    Route::get('facebook', 'Auth\LoginController@redirectToFacebook')->name('login_fb');
    Route::get('facebook/callback', 'Auth\LoginController@handleFacebookCallback')->name('handle_login_fb');
    Route::get('github', 'Auth\LoginController@redirectToGit')->name('login_git');
    Route::get('github/callback', 'Auth\LoginController@handleGitCallback')->name('handle_login_git');
});
Route::prefix('auth/api/')->group(function () {
    Route::get('confirmation', 'AdminUserController@identity_confirmation')->name('identity_confirmation');
    Route::post('confirmation', 'AdminUserController@handle_identity_confirmation')->name('handle_identity_confirmation');
});
Route::middleware(['auth', 'checkRole'])->group(function () {
    Route::prefix('admin/')->group(function () {
        Route::prefix('page_builder/')->group(function () {
            Route::get('create', 'AdminPageBuilder@create')->name('pgb.create');
            Route::get('edit', 'AdminPageBuilder@edit')->name('pgb.edit');
            Route::get('index', 'AdminPageBuilder@index')->name('pgb.index');
            Route::post('handle', 'AdminPageBuilder@handle')->name('pgb.handle');
            Route::post('render/package', 'AdminPageBuilder@render_package')->name('pgb.render.package');
        });
        //  //////////////////////////////////////// endfunction
        Route::get('fullcalender', 'FullCalenderController@index')->name('fullcalender');
        Route::post('fullcalenderAjax', 'FullCalenderController@ajax')->name('fullcalender_ajax');
        Route::prefix('auth/api/')->group(function () {
            Route::post('get/security_code', 'AdminUserController@get_security_code')->name('get_security_code');
            Route::post('get/api_token', 'AdminUserController@get_api_token')->name('get_api_token');
        });
        Route::get('dashboard', 'AdminDashBoardController@index')->name('dashboard');
        Route::prefix('dashboard/')->group(function () {
            Route::get('config_home', 'AdminDashBoardController@add_cofhome_view')->name('add_cofhome_view');
            Route::post('config_home', 'AdminDashBoardController@add_cofhome_handle')->name('add_cofhome_handle');
            Route::get('config_home/edit/{id}', 'AdminDashBoardController@edit_cofhome_view')->name('edit_cofhome_view')->where('id', '^[0-9]+$');
            Route::post('config_home/edit/{id}', 'AdminDashBoardController@edit_cofhome_handle')->name('edit_cofhome_handle')->where('id', '^[0-9]+$');
            Route::get('config_home/delete/{id}', 'AdminDashBoardController@delete_cofhome')->name('delete_cofhome')->where('id', '^[0-9]+$');
            Route::get('config_info', 'AdminDashBoardController@add_cofinfo_view')->name('add_cofinfor_view');
            Route::post('config_info', 'AdminDashBoardController@add_cofinfo_handle')->name('add_cofinfor_handle');
            Route::get('ci/view/edit/{id}', 'AdminDashBoardController@edit_info')->name('edit_info_view')->where('id', '^[0-9]+$');
            Route::post('ci/handle/edit/{id}', 'AdminDashBoardController@edit_info_handle')->name('edit_info_handle')->where('id', '^[0-9]+$');
            Route::get('config_info/delete/{id}', 'AdminDashBoardController@delete_cofinfo_handle')->name('delete_cofinfor_handle')->where('id', '^[0-9]+$');
        });
        Route::prefix('users/')->group(function () {
            Route::middleware('superAdmin')->group(function () {
                Route::get('add', 'AdminUserController@add')->name('add_user');
                Route::post('handle_add_user', 'AdminUserController@handle_add')->name('hanle_add_user');
                Route::get('edit/{id}', 'AdminUserController@edit')->name('edit_user')->where('id', '^[0-9]+$');
                Route::post('handle_edit/{id}', 'AdminUserController@handle_edit')->name('hanle_edit_user')->where('id', '^[0-9]+$');
                Route::get('handle_delete/{id}/{action}', 'AdminUserController@handle_delete')->name('handle_delete_user')->where('id', '^[0-9]+$');
                Route::prefix('list/')->group(function () {
                    Route::get('admin', 'AdminUserController@show_admin')->name('show_admin');
                    Route::get('user', 'AdminUserController@show_user')->name('show_user');
                });
            });
            Route::get('profile/{id}', 'AdminUserController@profile')->name('admin_profile')->where('id', '^[0-9]+$');
            Route::post('profile/ajax', 'AdminUserController@profile_ajax')->name('admin_profile_ajax');
            Route::get('setting-profile/{id}', 'AdminUserController@setting_profile')->name('setting_profile')->where('id', '^[0-9]+$');
            Route::post('setting-profile/save/{id}', 'AdminUserController@save_setting_profile')->name('save_setting_profile')->where('id', '^[0-9]+$');
            Route::post('show_user_ajax', 'AdminUserController@show_user_ajax')->name('show_user_ajax');
        });
        Route::prefix('orders/')->group(function () {
            Route::get('show', 'AdminOrderController@index')->name('show_orders');
            Route::get('customers', 'AdminOrderController@customers')->name('customers');
            Route::get('detail/{id}', 'AdminOrderController@detail')->name('detail_order')->where('id', '^[0-9]+$');
            Route::get('export/invoice/{id}', 'AdminOrderController@export_invoice')->name('export_invoice')->where('id', '^[0-9]+$');
            Route::prefix('pre_orders/')->group(function () {
                Route::get('show_preOrders', 'AdminOrderController@show_preOrders')->name('show_preOrders');
                Route::get('update_preOrders/{id}', 'AdminOrderController@update_preOrders')->name('update_preOrders')->where('id', '^[0-9]+$');
                Route::post('ajax_preOrders', 'AdminOrderController@ajax_preOrders')->name('ajax_preOrders');
                Route::post('handle_update/{id}', 'AdminOrderController@handle_update')->name('handle_update')->where('id', '^[0-9]+$');
            });
        });
        Route::prefix('ajax/')->group(function () {
            Route::prefix('rela/')->group(function () {
                Route::post('handle_model', 'AdminAjaxProductController@handle_model_rela')->name('handle_model_rela');
                Route::post('render_selected', 'AdminAjaxProductController@renderSelected')->name('render_selected');
            });
            Route::prefix('dashboard/')->group(function () {
                Route::post('home__section', 'AdminAjaxDashBoardController@home__section')->name('ajax.home__section');
                Route::post('update__order', 'AdminAjaxDashBoardController@update__order')->name('ajax.show_home_order');
            });
            Route::post('todos', 'AdminAjaxDashBoardController@todos')->name('todos');
            Route::post('price', 'AdminAjaxDashBoardController@price')->name('price');
            Route::prefix('product/')->group(function () {
                Route::post('handle_reload', 'AdminAjaxProductController@handle_reload')->name('handle_reload');
                Route::post('handle_search', 'AdminAjaxProductController@handle_search')->name('handle_search');
                Route::post('handle_cat', 'AdminAjaxProductController@handle_cat')->name('handle_cat');
                Route::post('handle_load', 'AdminAjaxProductController@handle_load')->name('handle_load');
                Route::post('handle_delete_gll', 'AdminAjaxProductController@handle_delete_gll')->name('handle_delete_gll');
            });
            Route::prefix('orders/')->group(function () {
                Route::post('handle_ajax_orders', 'AdminOrderController@handle_ajax')->name('handle_ajax_orders');
                Route::post('handle_ajax_customers', 'AdminOrderController@handle_ajax_customers')->name('handle_ajax_customers');
            });
            Route::prefix('blogs/')->group(function () {
                Route::post('ajax_blogs', 'AdminBlogController@ajaxData')->name('handle_ajax_blogs');
            });
            Route::prefix('slide/')->group(function () {
                Route::post('handle_update', 'AdminBannerController@handle_update')->name('handle_update_slide');
            });
            Route::prefix('category/product/')->group(function () {
                Route::get('block', 'AdminCategoryController@category_block_view')->name('category_block_view');
                Route::post('block/handle', 'AdminCategoryController@category_block_handle')->name('category_block_handle');
                Route::post('handle', 'AdminCategoryController@handle_category')->name('handle_category');
                Route::post('crawler', 'AdminCategoryController@crawler')->name('crawler.category');
            });
        });
        // /////////////////////////////////////////
        Route::prefix('product/')->group(function () {
            Route::prefix('category/')->group(function () {
                Route::get('cat', 'AdminCategoryController@cat')->name('cat');
                Route::post('cat', 'AdminCategoryController@handle_add')->name('handle_add_cat');
                Route::get('edit/{id}', 'AdminCategoryController@edit')->name('edit_cat')->where('id', '^[0-9]+$');
                Route::post('edit', 'AdminCategoryController@handle_edit')->name('handle_edit_cat');
                Route::get('delete/{id}', 'AdminCategoryController@handle_delete')->name('handle_delete_cat')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('prdcer', 'AdminCategoryController@prdcer')->name('prdcer');
                Route::post('prdcer', 'AdminCategoryController@handle_add_prdcer')->name('handle_add_prdcer');
                Route::get('prdcer/{id}', 'AdminCategoryController@handle_delete_prdcer')->name('handle_detele_prdcer')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('game', 'AdminCategoryController@game')->name('game');
                Route::post('game', 'AdminCategoryController@handle_add_game')->name('handle_add_game');
                Route::get('game/{id}', 'AdminCategoryController@handle_delete_game')->name('handle_detele_game')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('insurance', 'AdminCategoryController@insurance')->name('insurance');
                Route::post('insurance', 'AdminCategoryController@handle_add_insurance')->name('handle_add_insurance');
                Route::get('insurance/{id}', 'AdminCategoryController@handle_delete_insurance')->name('handle_detele_insurance')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('policy', 'AdminCategoryController@plc')->name('plc');
                Route::post('policy', 'AdminCategoryController@handle_plc')->name('handle_add_plc');
                Route::get('plc/edit/{id}', 'AdminCategoryController@plc_edit')->name('edit_plc')->where('id', '^[0-9]+$');
                Route::post('plc/edit/{id}', 'AdminCategoryController@handle_edit_plc')->name('handle_edit_plc')->where('id', '^[0-9]+$');
                Route::get('plc/delete/{id}', 'AdminCategoryController@handle_delete_plc')->name('handle_delete_plc')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
            });
            // /////////////////////////////////////////
            Route::get('add_product', 'AdminProductController@product_view_add')->name('add_product_view');
            Route::post('add_product', 'AdminProductController@product_handle_add')->name('product_handle_add');
            Route::get('block/view', 'AdminProductController@block__prodcut__view')->name('product_block_view');
            Route::post('block/handle', 'AdminProductController@block__product__handle')->name('product_block_handle');
            Route::get('show_product', 'AdminProductController@show_product')->name('show_product');
            Route::get('edit_product/{id}', 'AdminProductController@product_view_edit')->name('product_view_edit')->where('id', '^[0-9]+$');
            Route::post('edit_product/{id}', 'AdminProductController@product_handle_edit')->name('product_handle_edit')->where('id', '^[0-9]+$');
            Route::get('delete_product/{id}', 'AdminProductController@delete_product')->name('delete_product')->where('id', '^[0-9]+$');




            // end prefix product
        });
        // /////////////////////////////////////////
        Route::prefix('banner/')->group(function () {
            Route::get('add', 'AdminBannerController@banner_view_add')->name('banner_view_add');
            Route::post('add', 'AdminBannerController@banner_handle_add')->name('banner_handle_add');
            Route::get('edit/{id}', 'AdminBannerController@banner_view_edit')->name('banner_view_edit')->where('id', '^[0-9]+$');
            Route::post('edit/{id}', 'AdminBannerController@banner_handle_edit')->name('banner_handle_edit')->where('id', '^[0-9]+$');
        });
        Route::prefix('ads/')->group(function () {
            Route::get('add', 'AdminBannerController@ads_view_add')->name('ads_view_add');
            Route::post('add', 'AdminBannerController@ads_handle_add')->name('ads_handle_add');
            Route::get('edit/{id}', 'AdminBannerController@ads_view_edit')->name('ads_view_edit')->where('id', '^[0-9]+$');
            Route::post('edit/{id}', 'AdminBannerController@ads_handle_edit')->name('ads_handle_edit')->where('id', '^[0-9]+$');
            Route::post('delete/{id}', 'AdminBannerController@delete_handle')->name('ads_handle_delete')->where('id', '^[0-9]+$');
        });
        Route::prefix('slide/')->group(function () {
            Route::get('browser', 'AdminBannerController@slide_view_add')->name('slide_view_add');
            Route::post('browser', 'AdminBannerController@slide_handle_add')->name('slide_handle_add');
            Route::get('delete/{id}', 'AdminBannerController@slide_delete')->name('slide_delete')->where('id', '^[0-9]+$');
            Route::post('handle', 'AdminBannerController@slide_handle')->name('slide.handle');
            Route::post('modal/content', 'AdminBannerController@slide_modal_content')->name('slide.modal.content');
        });
        Route::prefix('blog/')->group(function () {
            Route::get('add', 'AdminBlogController@add')->name('add_blog_view');

            Route::get('show', 'AdminBlogController@show')->name('show_blogs');
            Route::get('edit/{id}', 'AdminBlogController@edit')->name('edit_blog')->where('id', '^[0-9]+$');
            Route::post('handle_edit_blog/{id}', 'AdminBlogController@handle_edit_blog')->name('handle_edit_blog')->where('id', '^[0-9]+$');
            Route::get('category', 'AdminBlogController@category')->name('category_blog');
            Route::post('handle_add', 'AdminBlogController@handle_add')->name('add_blog_handle');
            Route::post('hanle_add_blog', 'AdminBlogController@handle_add_blog')->name('handle_add_blog');
            Route::get('cat/delete/{id}', 'AdminBlogController@category')->name('delete_cat_blog')->where('id', '^[0-9]+$');
        });
        Route::prefix('page/')->group(function () {
            Route::get('manage_page', 'AdminPageController@manage')->name('manage_pages');
            Route::post('add', 'AdminPageController@add')->name('handle_add_page');
            Route::get('edit/{id}', 'AdminPageController@edit')->name('edit_page')->where('id', '^[0-9]+$');
            Route::post('edit/handle/{id}', 'AdminPageController@handle_edit')->name('handle_edit_page')->where('id', '^[0-9]+$');
            Route::post('delete/{id}', 'AdminPageController@delete')->name('handle_delete_page')->where('id', '^[0-9]+$');
        });
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
