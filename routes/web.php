<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Admin\PlantController;
use App\Http\Controllers\Admin\RolesController;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;




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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth', 'isSuper']], function () {
    //Category
    Route::resource('category', CategoryController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('recievedata',[PlantController::class,'recievedata'])->name('recievedata');
    Route::get('monitoring',[PlantController::class,'monitor'])->name('monitor');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/plant-disease', [PlantController::class, 'disease'])->name('plant.disease');
    Route::get('/plant-disease-history', [PlantController::class, 'history'])->name('plant.history');
    Route::get('/plant-disease-edit/{$id}', [PlantController::class, 'edit'])->name('plant.edit');
    Route::delete('/plant-disease-delete', [PlantController::class, 'delete'])->name('plant.delete');
    Route::post('/plant-disease-upload', [PlantController::class, 'upload'])->name('plant.disease.upload');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

    // CRUD Generator
    Route::get('crud-generator', [Hamdan\CrudGenerator\Controllers\ProcessController::class, 'getGenerator'])->name('generator');
    Route::post('process', [Hamdan\CrudGenerator\Controllers\ProcessController::class, 'postGenerator'])->name('postGenerator');



    // Config
    Route::group(['prefix' => 'config'], function () {
        Route::get('favicon', [ConfigController::class, 'favicon'])->name('admin.config.favicon');
        Route::get('logo', [ConfigController::class, 'logo'])->name('admin.config.logo');
        Route::get('settings', [ConfigController::class, 'configSettings'])->name('admin.config.settings');
        Route::post('update', [ConfigController::class, 'configPost'])->name('admin.config.post');
        Route::get('option', [ConfigController::class, 'configOption'])->name('admin.config.option');
        Route::post('option/update', [ConfigController::class, 'configOptionUpdate'])->name('admin.config.option.update');
    });

    // Banner
    Route::resource('banner', BannerController::class);

    //Category
    Route::resource('category', CategoryController::class);

    //Product
    Route::resource('product', ProductController::class);

    //Delete Productimage
    Route::post('/product/delete-image', [ProductController::class, 'deleteImages'])->name('product.delete_img');

    //Attribute
    Route::resource('attribute', AttributeController::class);

    //Delete Attribute Value
    Route::post('/product/delete-attribute-value', [AttributeController::class, 'deleteAttrValue'])->name('attribute.deleteAttrValue');


    // Customer
    Route::resource('customer', CustomerController::class);

    require_once('crudweb.php');
});

Route::group(['prefix' => 'user', 'middleware' =>  ['auth', 'isUser']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
});
