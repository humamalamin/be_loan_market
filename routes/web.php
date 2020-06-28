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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
        Route::group(['prefix' => 'branch'], function() {
            Route::get('/', 'BranchController@index')->name('branch');
            Route::get('/{id}/show', 'BranchController@show')->name('branch.show');
            Route::get('/create', 'BranchController@create')->name('branch.create');
            Route::post('/', 'BranchController@store')->name('branch.store');
            Route::get('/{id}/edit', 'BranchController@edit')->name('branch.edit');
            Route::put('/{id}/update', 'BranchController@update')->name('branch.update');
            Route::get('/{id}/delete', 'BranchController@destroy')->name('branch.delete');
        });

        Route::group(['prefix' => 'adviser'], function() {
            Route::get('/', 'AdviserController@index')->name('adviser');
            Route::get('/{id}/show', 'AdviserController@show')->name('adviser.show');
            Route::get('/create', 'AdviserController@create')->name('adviser.create');
            Route::post('/', 'AdviserController@store')->name('adviser.store');
            Route::get('/{id}/edit', 'AdviserController@edit')->name('adviser.edit');
            Route::put('/{id}/update', 'AdviserController@update')->name('adviser.update');
            Route::get('/{id}/delete', 'AdviserController@destroy')->name('adviser.delete');
        });
    });
});
