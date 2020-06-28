<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'as' => 'api.v1', 'middleware' => ['base-response'], 'namespace' => 'API'], function () {
    Route::get('branch', 'BranchController@index')->name('.branch.index');
    Route::get('branch/{id}/show', 'BranchController@show')->name('.branch.show');

    Route::get('adviser', 'AdviserController@index')->name('.adviser.index');
    Route::get('adviser/{id}/show', 'AdviserController@show')->name('.adviser.show');
    Route::get('adviser/branch/{id}', 'AdviserController@getByBranch')->name('.adviser.branch');
});
