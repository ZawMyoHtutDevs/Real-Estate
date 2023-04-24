<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\RegionController as AdminRegionController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\ListingController as AdminListingController;
use App\Http\Controllers\Admin\AttributeController as AdminAttributeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Http\Controllers\Frontend\ListingController as FrontendListingController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\FrontendController;
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
// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    // User and Account
    Route::get('/accounts', [AdminAccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/accounts/create', [AdminAccountController::class, 'create'])->name('admin.accounts.create');
    Route::post('/accounts/store', [AdminAccountController::class, 'store'])->name('admin.accounts.store');
    Route::post('/accounts/destroy/{id}', [AdminAccountController::class, 'destroy'])->name('admin.accounts.destroy');
    Route::get('account/{id}', [AdminAccountController::class, 'edit'])->name('admin.accounts.edit');
    Route::put('/accounts/update/{id}', [AdminAccountController::class, 'update'])->name('admin.accounts.update');
    Route::put('/change_password/{id}', [AdminAccountController::class, 'change_password'])->name('change.password');


    // Type 
    Route::get('/types', [AdminTypeController::class, 'index'])->name('admin.types.index');
    Route::post('/types/store', [AdminTypeController::class, 'store'])->name('admin.types.store');
    Route::get('/types/edit/{id}', [AdminTypeController::class, 'edit'])->name('admin.types.edit');
    Route::put('/types/update/{id}', [AdminTypeController::class, 'update'])->name('admin.types.update');
    Route::delete('types/destroy/{id}', [AdminTypeController::class, 'destroy'])->name('admin.types.destroy');


    // Category 
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('categories/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Region 
    Route::get('/regions', [AdminRegionController::class, 'index'])->name('admin.regions.index');
    Route::post('/regions/store', [AdminRegionController::class, 'store'])->name('admin.regions.store');
    Route::get('/regions/edit/{id}', [AdminRegionController::class, 'edit'])->name('admin.regions.edit');
    Route::put('/regions/update/{id}', [AdminRegionController::class, 'update'])->name('admin.regions.update');
    Route::delete('regions/destroy/{id}', [AdminRegionController::class, 'destroy'])->name('admin.regions.destroy');


    // City 
    Route::get('/cities', [AdminCityController::class, 'index'])->name('admin.cities.index');
    Route::post('/cities/store', [AdminCityController::class, 'store'])->name('admin.cities.store');
    Route::get('/cities/edit/{id}', [AdminCityController::class, 'edit'])->name('admin.cities.edit');
    Route::put('/cities/update/{id}', [AdminCityController::class, 'update'])->name('admin.cities.update');
    Route::delete('cities/destroy/{id}', [AdminCityController::class, 'destroy'])->name('admin.cities.destroy');


    // Attribute 
    Route::get('/attributes', [AdminAttributeController::class, 'index'])->name('admin.attributes.index');
    Route::post('/attributes/store', [AdminAttributeController::class, 'store'])->name('admin.attributes.store');
    Route::get('/attributes/edit/{id}', [AdminAttributeController::class, 'edit'])->name('admin.attributes.edit');
    Route::put('/attributes/update/{id}', [AdminAttributeController::class, 'update'])->name('admin.attributes.update');
    Route::delete('attributes/destroy/{id}', [AdminAttributeController::class, 'destroy'])->name('admin.attributes.destroy');


    // Contact
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/show/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('contacts/destroy/{id}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');

    // listing
    Route::get('/listings', [AdminListingController::class, 'index'])->name('admin.listings.index');
    Route::get('/listings/create', [AdminListingController::class, 'create'])->name('admin.listings.create');
    Route::get('/listings/create/step_one', [AdminListingController::class, 'create_st_one'])->name('admin.listings.create_st_one');
    Route::post('/listings/store', [AdminListingController::class, 'store'])->name('admin.listings.store');

    Route::get('/listings/edit/{id}', [AdminListingController::class, 'edit'])->name('admin.listings.edit');
    Route::put('/listings/update/{id}', [AdminListingController::class, 'update'])->name('admin.listings.update');
    Route::delete('listings/destroy/{id}', [AdminListingController::class, 'destroy'])->name('admin.listings.destroy');


});
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend');

Route::post('api/fetch-cities', [FrontendHomeController::class, 'fetchCities'])->name('api.cities');

// Listing
Route::get('/listings', [FrontendListingController::class, 'index'])->name('frontend.listings.index');
Route::get('/listings/{url}', [FrontendListingController::class, 'show'])->name('frontend.listings.show');

// contact
Route::post('/contact/store/{id}', [FrontendContactController::class, 'store'])->name('frontend.contact.store');

Auth::routes(['register'=> false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
