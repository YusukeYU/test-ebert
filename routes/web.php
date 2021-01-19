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
    Route::post('/dashboard/users/find', 'UserController@find')->name('find-user');
    Route::get('/logout',['middleware' => 'auth', 'uses' => 'UserController@logout'], )->name('Logout');
});