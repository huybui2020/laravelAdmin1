<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/posts', 'Admin\\PostsController');

Route::get('/tin-tuc/{slug}', 'Admin\\PostsController@display' );
Route::get('/{slug}','Admin\\PostsController@postbycate' );


Route::resource('admin/images', 'Admin\\ImagesController');
Route::resource('admin/images', 'Admin\\ImagesController');
Route::resource('admin/images', 'Admin\\ImagesController');
Route::resource('admin/img', 'Admin\\ImgController');
Route::resource('admin/images', 'Admin\\ImagesController');
Route::resource('admin/images', 'Admin\\ImagesController');
Route::resource('admin/carousel', 'Admin\\CarouselController');
Route::resource('admin/carousels', 'Admin\\CarouselsController');
Route::resource('admin/carousels', 'Admin\\CarouselsController');

Route::get('carousel/{id}/activve', 'Admin\\CarouselsController@isActive')->name('update_active');
Route::get('/categories/{id}/active', 'Admin\\CategoriesController@isActive')->name('update_cate_active');
