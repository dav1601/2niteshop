<?php

use App\Events\common;
use App\Events\TestEvent;
use App\Http\Controllers\AdminMediaProduts;
use App\Http\Controllers\AdminProductController;
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
Route::middleware(['auth', 'r_o_p:super-admin|Manager'])->group(function () {
    Route::prefix('admin/')->group(function () {
        Route::controller(AdminPageBuilder::class)->prefix('page_builder/')->middleware('r_o_p:super-admin|Design Mode')->group(function () {
            Route::get('create_or_edit/{type?}', 'create_or_edit')->name('pgb.create.or.edit');
            Route::get('edit', 'edit')->name('pgb.edit');
            Route::get('index', 'index')->name('pgb.index');
            Route::post('handle', 'handle')->name('pgb.handle');
            Route::post('render/package', 'render_package')->name('pgb.render.package');
            Route::post('render/package/component', 'render_package_component')->name('pgb.render.package.component');
        });
        //  //////////////////////////////////////// endfunction
        Route::get('fullcalender', 'FullCalenderController@index')->name('fullcalender');
        Route::post('fullcalenderAjax', 'FullCalenderController@ajax')->name('fullcalender_ajax');

        // //////////////////////////////////////////
        Route::controller(AdminDashBoardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
            Route::prefix('dashboard/')->group(function () {
                Route::get('config_home', 'add_cofhome_view')->name('add_cofhome_view');
                Route::post('config_home', 'add_cofhome_handle')->name('add_cofhome_handle');
                Route::get('config_home/edit/{id}', 'edit_cofhome_view')->name('edit_cofhome_view')->where('id', '^[0-9]+$');
                Route::post('config_home/edit/{id}', 'edit_cofhome_handle')->name('edit_cofhome_handle')->where('id', '^[0-9]+$');
                Route::get('config_home/delete/{id}', 'delete_cofhome')->name('delete_cofhome')->where('id', '^[0-9]+$');
                Route::get('config_info', 'add_cofinfo_view')->name('add_cofinfor_view');
                Route::post('config_info', 'add_cofinfo_handle')->name('add_cofinfor_handle');
                Route::get('ci/view/edit/{id}', 'edit_info')->name('edit_info_view')->where('id', '^[0-9]+$');
                Route::post('ci/handle/edit/{id}', 'edit_info_handle')->name('edit_info_handle')->where('id', '^[0-9]+$');
                Route::get('config_info/delete/{id}', 'delete_cofinfo_handle')->name('delete_cofinfor_handle')->where('id', '^[0-9]+$');
            });
        });
        /////// /////////// ///////////  /////////// /////////// //////////
        Route::controller(AdminUserController::class)->prefix('users/')->group(function () {
            Route::middleware(['role:super-admin'])->group(function () {
                Route::get('add_permissions', 'add_permissions')->name('add_permissions');
                Route::get('add_roles', 'add_roles')->name('add_roles');
                Route::get('edit_roles/{id}', 'edit_roles')->name('edit_roles');
                Route::match(array('get', 'post'), 'handle_permissions/{type}', 'handle_permissions')->name('handle_permissions');
                Route::match(array('get', 'post'), 'handle_roles/{type}', 'handle_roles')->name('handle_roles');
            });
            // //////////////////////////////////////////////////////////////////
            Route::middleware('role:Store Administrator|super-admin')->group(function () {
                Route::get('add', 'add')->name('add_user');
                Route::post('handle_add_user', 'handle_add')->name('hanle_add_user');
                Route::get('edit/{id}', 'edit')->name('edit_user')->where('id', '^[0-9]+$');
                Route::post('handle_edit/{id}', 'handle_edit')->name('hanle_edit_user')->where('id', '^[0-9]+$');
                Route::get('handle_delete/{id}/{action}', 'handle_delete')->name('handle_delete_user')->where('id', '^[0-9]+$');
                Route::prefix('list/')->group(function () {
                    Route::get('admin', 'show_admin')->name('show_admin');
                    Route::get('user', 'show_user')->name('show_user');
                });
                Route::post('show_user_ajax', 'show_user_ajax')->name('show_user_ajax');
            });
            Route::get('profile/{id}', 'profile')->name('admin_profile')->where('id', '^[0-9]+$');
            Route::post('profile/ajax', 'profile_ajax')->name('admin_profile_ajax');
            Route::get('setting-profile/{id}', 'setting_profile')->name('setting_profile')->where('id', '^[0-9]+$');
            Route::post('setting-profile/save/{id}', 'save_setting_profile')->name('save_setting_profile')->where('id', '^[0-9]+$');
            // //////////////////////////////////////////////////////////
            Route::prefix('auth/api/')->group(function () {
                Route::post('get/security_code', 'get_security_code')->name('get_security_code');
                Route::post('get/api_token', 'get_api_token')->name('get_api_token');
            });
        });

        // //////////////

        Route::controller(AdminOrderController::class)->prefix('orders/')->group(function () {
            Route::middleware("r_o_p:super-admin|Manage Orders")->group(function () {
                Route::get('show', 'index')->name('show_orders');
                Route::get('customers', 'customers')->name('customers');
                Route::get('detail/{id}', 'detail')->name('detail_order')->where('id', '^[0-9]+$');
                Route::get('export/invoice/{id}', 'export_invoice')->name('export_invoice')->where('id', '^[0-9]+$');
            });
            Route::middleware("r_o_p:super-admin|Manage PreOrders")->group(function () {
                Route::prefix('pre_orders/')->group(function () {
                    Route::get('show_preOrders', 'show_preOrders')->name('show_preOrders');
                    Route::get('update_preOrders/{id}', 'update_preOrders')->name('update_preOrders')->where('id', '^[0-9]+$');
                    Route::post('ajax_preOrders', 'ajax_preOrders')->name('ajax_preOrders');
                    Route::post('handle_update/{id}', 'handle_update')->name('handle_update')->where('id', '^[0-9]+$');
                });
            });
            Route::post('handle_ajax_orders', 'AdminOrderController@handle_ajax')->name('handle_ajax_orders');
            Route::post('handle_ajax_customers', 'AdminOrderController@handle_ajax_customers')->name('handle_ajax_customers');
        });
        // ///////////////////////////
        Route::prefix('ajax/')->group(function () {
            Route::controller(AdminAjaxProductController::class)->group(function () {
                Route::prefix('rela/')->group(function () {
                    Route::post('handle_model', 'handle_model_rela')->name('handle_model_rela');
                    Route::post('render_selected', 'renderSelected')->name('render_selected');
                });
                Route::prefix('product/')->group(function () {
                    Route::post('handle_reload', 'handle_reload')->name('handle_reload');
                    Route::post('handle_search', 'handle_search')->name('handle_search');
                    Route::post('handle_cat', 'handle_cat')->name('handle_cat');
                    Route::post('handle_load', 'handle_load')->name('handle_load');
                    Route::post('handle_delete_gll', 'handle_delete_gll')->name('handle_delete_gll');
                    Route::post('handle_gallery', 'handle_gallery')->name('handle_gallery');
                });
            });
            Route::controller(AdminAjaxDashBoardController::class)->group(function () {
                Route::post('todos', 'todos')->name('todos');
                Route::post('price', 'price')->name('price');
            });

            Route::prefix('slide/')->group(function () {
                Route::post('handle_update', 'AdminBannerController@handle_update')->name('handle_update_slide');
            });
        });
        ////////////////////////////////////////////////////////////////
        Route::controller(AvMediaController::class)->prefix('media/')->middleware(["r_o_p:super-admin|Sales Manager|Store Administrator"])->group(function () {
            Route::post('/upload', 'upload')->name('a-media.upload');
            Route::post('/load/media', 'index')->name('a-media.load');
            Route::post('/load/media/{id}', 'detail')->name('a-media.detail');
            Route::post('/delete', 'delete')->name('a-media.delete');
            Route::post('/update', 'update')->name('a-media.update');
        });
        // /////////////////////////////////////////
        Route::prefix('product/')->group(function () {
            Route::post('ajax/handle_image', 'AdminAjaxCategoryController@handleImage')->name('ajax.handleImage');
            Route::controller(AdminCategoryController::class)->prefix('category/')->group(function () {
                Route::get('cat', 'cat')->name('cat');
                Route::post('cat', 'handle_add')->name('handle_add_cat');
                Route::get('edit/{id}', 'edit')->name('edit_cat')->where('id', '^[0-9]+$');
                Route::post('edit', 'handle_edit')->name('handle_edit_cat');
                Route::get('delete/{id}', 'handle_delete')->name('handle_delete_cat')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('prdcer', 'prdcer')->name('prdcer');
                Route::post('prdcer', 'handle_add_prdcer')->name('handle_add_prdcer');
                Route::get('prdcer/{id}', 'handle_delete_prdcer')->name('handle_detele_prdcer')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('game', 'game')->name('game');
                Route::post('game', 'handle_add_game')->name('handle_add_game');
                Route::get('game/{id}', 'handle_delete_game')->name('handle_detele_game')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('insurance', 'insurance')->name('insurance');
                Route::post('insurance', 'handle_add_insurance')->name('handle_add_insurance');
                Route::get('insurance/{id}', 'handle_delete_insurance')->name('handle_detele_insurance')->where('id', '^[0-9]+$');
                // ////////////////////////////////////
                Route::get('policy', 'plc')->name('plc');
                Route::post('policy', 'handle_plc')->name('handle_add_plc');
                Route::get('plc/edit/{id}', 'plc_edit')->name('edit_plc')->where('id', '^[0-9]+$');
                Route::post('plc/edit/{id}', 'handle_edit_plc')->name('handle_edit_plc')->where('id', '^[0-9]+$');
                Route::get('plc/delete/{id}', 'handle_delete_plc')->name('handle_delete_plc')->where('id', '^[0-9]+$');
                // //////////////////////////////////////////////////////////////////
                Route::prefix('ajax/category/product/')->group(function () {
                    Route::get('block', 'category_block_view')->name('category_block_view');
                    Route::post('block/handle', 'category_block_handle')->name('category_block_handle');
                    Route::post('handle', 'handle_category')->name('handle_category');
                    Route::post('crawler', 'crawler')->name('crawler.category');
                });
            });

            // /////////////////////////////////////////
            // AdminProductController
            Route::controller(AdminProductController::class)->group(function () {
                Route::get('add_product', 'product_view_add')->name('add_product_view');
                Route::post('add_product', 'product_handle_add')->name('product_handle_add');
                Route::get('block/view', 'block__prodcut__view')->name('product_block_view');
                Route::post('block/handle', 'block__product__handle')->name('product_block_handle');
                Route::get('show_product', 'show_product')->name('show_product');
                Route::get('edit_product/{id}', 'product_view_edit')->name('product_view_edit')->where('id', '^[0-9]+$');
                Route::post('edit_product/{id}', 'product_handle_edit')->name('product_handle_edit')->where('id', '^[0-9]+$');
                Route::get('delete_product/{id}', 'delete_product')->name('delete_product')->where('id', '^[0-9]+$');
            });

            // end prefix product
        });
        // /////////////////////////////////////////
        Route::controller(AdminBlogController::class)->prefix('blog/')->group(function () {
            Route::get('add', 'add')->name('add_blog_view');
            Route::get('show', 'show')->name('show_blogs');
            Route::get('edit/{id}', 'edit')->name('edit_blog')->where('id', '^[0-9]+$');
            Route::post('handle_edit_blog/{id}', 'handle_edit_blog')->name('handle_edit_blog')->where('id', '^[0-9]+$');
            Route::get('category', 'category')->name('category_blog');
            Route::post('handle_add', 'handle_add')->name('add_blog_handle');
            Route::post('hanle_add_blog', 'handle_add_blog')->name('handle_add_blog');
            Route::get('cat/delete/{id}', 'category')->name('delete_cat_blog')->where('id', '^[0-9]+$');
            Route::post('ajax_blogs', 'AdminBlogController@ajaxData')->name('handle_ajax_blogs');
        });
        Route::controller(AdminPageController::class)->prefix('page/')->group(function () {
            Route::get('manage_page', 'manage')->name('manage_pages');
            Route::post('add', 'add')->name('handle_add_page');
            Route::get('edit/{id}', 'edit')->name('edit_page')->where('id', '^[0-9]+$');
            Route::post('edit/handle/{id}', 'handle_edit')->name('handle_edit_page')->where('id', '^[0-9]+$');
            Route::post('delete/{id}', 'delete')->name('handle_delete_page')->where('id', '^[0-9]+$');
        });
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'r_o_p:super-admin|Manager']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
