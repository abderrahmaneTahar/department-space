<?php

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
    return view('accueil');
})->name('accueil');

route::get('dd','messageController@friends');
Auth::routes();

Route::middleware('auth:web')->get('/profile/{id}','userController@visitProfile')->name('visité');
Route::middleware('auth:web')->get('profile','userController@profile')->name('profile');
Route::middleware('auth:web')->post('/profile','userController@update_profile');

Route::post('/search', 'HomeController@recherche')->name('search');
Route::get('/home', 'HomeController@index')->name('home');
route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

route::prefix('prof')->group(function() {
Route::get('/login', 'Auth\ProfLoginController@showLoginForm')->name('prof.login');
Route::post('/login', 'Auth\ProfLoginController@showLogin')->name('prof.login.submit');
Route::get('/', 'ProfController@index')->name('prof.dashboard');
route::get('/logout','Auth\ProfLoginController@logout')->name('prof.logout');
});

route::prefix('admin')->group(function() {
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/prof_register', 'Auth\ProfRegisterController@showRegisterForm')->name('prof.register');
route::post('/prof_registere', 'Auth\ProfRegisterController@register')->name('professeur.register.submit');
route::get('/profList','adminController@profList')->name('profList');

route::delete('/prof_delete/{id}','adminController@prof_destroy')->name('prof_sup');

Route::POST('/prof_register', 'adminController@add_prof')->name('admin.prof.register.submit');

route::get('/modules','adminController@modules_index')->name('modules_index');
route::get('/module_create','moduleController@create');
route::post('/module_store','moduleController@store');
route::delete('/module_delete/{id}','moduleController@destroy');

route::get('/publications/create','PublicationController@admin_create')->name('admin_create');
//route::get('/publications/admin_Publications','PublicationController@admin_pub')->name('admin_pub');
route::get('/publications/{id}','adminController@accupte');
route::delete('/publications/{id}','adminController@destroy');
route::get('/publications/create','adminController@admin_create')->name('admin_create');
route::post('/publications/store','adminController@admin_store');
route::delete('/publications/delete/{id}','adminController@destroy');
route::get('/publicationss/{id}/edit','adminController@edit');
route::get('/publications/admin_Publications','adminController@admin_pub')->name('admin_pub');
route::get('/publications','adminController@index')->name('adminIndex');

});

Route::get('publications/','PublicationController@index')->name('pub');
Route::post('publications/','PublicationController@indexContunu');	
route::middleware('auth:web')->prefix('publications')->group(function() {
Route::get('/create','PublicationController@create')->name('create');	
Route::post('/store','PublicationController@store');	
Route::get('/{id}/edit','PublicationController@edit');
Route::put('/{id}','PublicationController@update');
Route::delete('/{id}','PublicationController@destroy');
Route::get('/myPublications','PublicationController@myPublicationIndex')->name('my_pub');
Route::get('/','PublicationController@index')->name('pub');	
});

route::middleware('auth:web')->get('/messages',function(){return view('messages');})->name('messages');
route::middleware('auth:web')->get('/messages/recived','messageController@recived')->name('recived');
route::get('/messages/sent','messageController@Isent')->name('sent');

route::middleware('auth:web')->get('/friends', 'friendsController@unfriendsIndex')->name('friends');



//Route::get('publications-page','pubController@viewInfiniteScroll');
//Route::post('publications-page','pubController@getInfiniteScroll');