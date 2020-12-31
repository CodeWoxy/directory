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

// ================================ ADMIN ============================================

Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index');
    Route::post('/', 'AdminController@login');
    Route::get('/signup', 'AdminController@signup');

    Route::middleware('multiauth:admin')->group(function(){

        //============================= Categories ===============================================

        Route::get('logout', 'AdminController@logout')->name('admin-logout');

        Route::get('categories', 'CategoryController@index')->name('admin-cats');
        Route::get('category/add', 'CategoryController@add')->name('admin-cat-add');
        Route::post('category/add', 'CategoryController@up');
        Route::get('category/update/{id}', 'CategoryController@updateView')->name('admin-cat-update');
        Route::post('category/update/{id}', 'CategoryController@update');
        Route::get('category/delete/{id}', 'CategoryController@categorydelete');

        //============================== Sub-Categories ===========================================

        Route::prefix('subcategory')->group(function(){
            Route::get('/', 'SubCategoryController@index')->name('admin-subcategory');
            Route::get('/add', 'SubCategoryController@addView')->name('admin-subcategory-add');
            Route::post('/add', 'SubCategoryController@up');
            Route::get('/update/{id}', 'SubCategoryController@updateView');
            Route::post('/update/{id}', 'SubCategoryController@update');
            Route::get('/delete/{id}', 'SubCategoryController@delete');
        });

        //============================== Companies ===========================================

        Route::prefix('company')->group(function(){
            Route::get('/', 'CompanyController@index')->name('admin-company');
            Route::get('/add', 'CompanyController@addView')->name('admin-company-add');
            Route::post('/add', 'CompanyController@up');
            Route::get('/update/{id}', 'CompanyController@updateView');
            Route::post('/update/{id}', 'CompanyController@update');
            Route::get('/delete/{id}', 'CompanyController@down');
        });

        Route::prefix('package')->group(function(){
            Route::get('/', 'PackageController@index')->name('admin-package');
            Route::get('/add', 'PackageController@addView')->name('admin-package-add');
            Route::post('/add', 'PackageController@up');
            Route::get('/update/{id}', 'PackageController@updateView');
            Route::post('/update/{id}', 'PackageController@update');
            Route::get('/delete/{id}', 'PackageController@down');
        });


        Route::get('profile', 'AdminController@dashboard')->name('admin-profile');

    });
});
