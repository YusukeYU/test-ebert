<?php
use Illuminate\Support\Facades\Auth;


Route::get('/', function () { 
    if(Auth::check()){
        return redirect('/dashboard/main');
    }
    return view('admin.startPages.login');
})->name('login');
Route::post('/', 'UserController@makeLogin')->name('makeLogin');


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard/main',['uses' => 'UserController@pageMain'], )->name('Main');
    Route::resource('/dashboard/users', 'UserController');
    Route::resource('/dashboard/products', 'ProductController');
    Route::resource('/dashboard/categories', 'CategoryController');
    Route::resource('/dashboard/subcategories', 'SubcategoryController');
    Route::post('/dashboard/users/find', 'UserController@find')->name('find-user');
    Route::post('/dashboard/products/find', 'ProductController@find')->name('find-product');
    Route::post('/dashboard/subcategories/find', 'SubcategoryController@find')->name('find-subcategory');
    Route::post('/dashboard/categories/find', 'CategoryController@find')->name('find-category');
    Route::get('/dashboard/products/filter/{category_product?}/{name_product?}', 'ProductController@filterByCategory')->name('filter-category');
    Route::get('/logout',['middleware' => 'auth', 'uses' => 'UserController@logout'], )->name('Logout');
});



