<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth.api.admin'])->group(function () {
    Route::get('users', 'Api\UserApiController@index');
    Route::group(['prefix' => 'products/'], function () {
        Route::get('list', 'Api\ProductsController@index');
        Route::get('product/{slug}', 'Api\ProductsController@retrieve_product');
        Route::get('search_product', 'Api\ProductsController@search_product');
        Route::get('product_properties', 'Api\ProductsController@product_properties');
        Route::group(['prefix' => 'categories/'], function () {
            Route::get('properties', 'Api\ProductCategoriesController@product_categories_properties');
            Route::get('list_all', 'Api\ProductCategoriesController@product_categories');
            Route::get('game', 'Api\ProductCategoriesController@categories_game');
            Route::get('producer', 'Api\ProductCategoriesController@categories_producer');
        });
    });
    Route::group(['prefix' => 'blogs/'], function () {
        Route::get('list', 'Api\BlogController@index');
        Route::get('blog/{slug}', 'Api\BlogController@retrieve_blog');
        Route::get('search_blog', 'Api\BlogController@search_blog');
        Route::get('blog_properties', 'Api\BlogController@blog_properties');
        Route::group(['prefix' => 'categories/'], function () {
            Route::get('properties', 'Api\BlogCategoriesController@blog_categories_properties');
            Route::get('list_all', 'Api\BlogCategoriesController@blog_categories');
        });
    });
});
Route::group(['prefix' => 'auth/'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
    Route::group(['prefix' => 'reset/passowrd/'], function () {
        Route::post('forgot', 'Api\PasswordResetSmsController@forgot');
        Route::post('verification', 'Api\PasswordResetSmsController@verification');
        Route::post('new_password', 'Api\PasswordResetSmsController@new_password');
    });
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'Api\AuthController@logout');
        Route::get('me/{id}', 'Api\AuthController@me');
        Route::get('me/orders/{id}', 'Api\AuthController@me_orders');
        Route::post('update/{id}', 'Api\AuthController@update');
    });
});
