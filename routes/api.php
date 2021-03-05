<?php

use Illuminate\Http\Request;

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

//Route::get('/publications/download/{pub_id}','PublicationController@download');

Route::get('/niveau/{fillter}','PublicationController@parNiveau');

Route::get('/modules/{fillter}','moduleController@nomModules'); 
Route::get('/parModules/{modul}','PublicationController@parModule');

Route::prefix('message')->group(function() {

Route::post('/inbox','messageController@inbox');
Route::post('/sent','messageController@sent');
Route::post('/store/{id}','messageController@store');
Route::get('/read/{id}','messageController@read');
Route::post('/email','messageController@email');

});

route::prefix('friends')->group(function() {

route::post('/friend/{id}','friendsController@friending');
route::post('/unfriend/{id}','friendsController@unfriending');
route::post('/friends','friendsController@friends')->name('friends');
route::post('/unfriends','friendsController@unfriends')->name('unfriends');

});