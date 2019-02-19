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

Route::get('/', 'Controller@index');

Route::get('/terms', function(){
	return view('terms');
});
Route::get('help', function(){
	return view('help');
});


Route::get('/sales', function() {
	return view('sales');
});
Route::get('/sellchar', function(){
	return view('sell_char'); 
})->middleware(['auth']);

Route::get('/acess_keys', function(){
	return view('acess_keys'); 
});
Route::get('/special_keys', function(){
	return view('special_keys'); 
});


route::get('/search', 'CharactersController@findchar')->name('searchchar');

route::get('/sellchar/find/', 'CharactersController@find')->name('findchar');

route::get('/load/worlds', 'Controller@loadWorlds')->name('loadworlds');
route::get('/char/{url}', 'CharactersController@show');


route::get('/home', function(){
	return redirect('/control-panel');
});

route::get('/characters/del/{id}', 'CharactersController@destroy');

route::get('/characters/sold/{id}', 'CharactersController@setSold');

route::get('/characters/unsold/{id}', 'CharactersController@setUnSold');



route::post('/characters/confirm', 'Controller@sentCoins')->name('sentcoins');

// API 
Route::resource('/characters', 'CharactersController');
Route::resource('/rares', 'RaresController');
Route::resource('/tibiacoins', 'CoinController');

Route::group(['prefix' => 'donate'], function () {

Route::get('/', 'CharactersController@indexDonate')->name('panel');
Route::get('/{id}', 'CharactersController@showDonate');
route::Post('/confirm', 'CharactersController@confirmDonate')->name('confirmDonate');


});

Auth::routes();

Route::group(['prefix' => 'control-panel'], function () {

Route::get('/', 'HomeController@index')->name('panel');
Route::get('/rep', 'HomeController@rep')->name('rep');
Route::get('/perfil', 'HomeController@perfil')->name('perfil');
Route::group(['prefix' => 'admin'], function () {

Route::get('/', 'HomeController@admin')->name('admin');
Route::post('/ativar-anuncio', 'HomeController@ativaranuncio')->name('admin');
});

Route::get('/change-password','HomeController@showChangePasswordForm');

Route::post('/change/password','HomeController@changePassword')->name('changePassword');

Route::post('/change/contact','HomeController@changeContact')->name('changeContact');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('/intermediate', 'MessagesController@trust');

    Route::post('/interested', 'MessagesController@interested');
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});



});






Route::get('/user/{nick}', 'UsersController@show')->name('ShowUser');


