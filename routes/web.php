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
    return view('/auth/login');
});

Auth::routes();

Route::get('/sistemasca', 'PageController@view_login')->name('sistemasca');

Route::get('/metrics', 'PageController@view_metrics')->name('metrics');

Route::get('/metricsorganizations', 'PageController@view_metricsorganizations')->name('metricsorganizations');

Route::get('/metricsinitiatives', 'PageController@view_metricsinitiatives')->name('metricsinitiatives');

Route::get('/alphabetical', 'PageController@view_alphabetical')->name('alphabetical');

Route::post('/alphabetical', 'PageController@order_alphabetical')->name('alphabetical');

Route::get('/names', 'PageController@view_names')->name('names');

Route::post('/names', 'PageController@order_initiatives')->name('names');

Route::get('/states', 'PageController@view_states')->name('states');

Route::post('/states', 'PageController@order_states')->name('states');

Route::get('/sectors', 'PageController@view_sectors')->name('sectors');

Route::post('/sectors', 'PageController@order_sectors')->name('sectors');

Route::get('/actions', 'PageController@view_actions')->name('actions');

Route::post('/actions', 'PageController@order_actions')->name('actions');

Route::get('/istates', 'PageController@view_istates')->name('istates');

Route::post('/istates', 'PageController@order_istates')->name('istates');

Route::get('/detailini/{id}', 'PageController@view_detailini')->name('detailini');

Route::group(['middleware'=>'auth'], function(){

	Route::get('/home', 'PageController@view_users')->name('home');

	Route::get('/users', 'PageController@view_users')->name('users');

	Route::get('/rusers', 'PageController@view_rusers')->name('rusers');

	Route::post('/rusers', 'PageController@register_users')->name('rusers');

	Route::get('/uusers/{id}', 'PageController@view_uusers')->name('uusers');

	Route::post('/uusers/{id}', 'PageController@update_users')->name('uusers');

	Route::get('/dusers/{id}', 'PageController@view_dusers')->name('dusers');

	Route::post('/dusers/{id}', 'PageController@delete_users')->name('dusers');

	Route::get('/organizations', 'PageController@view_organizations')->name('organizations');

	Route::get('/rorganizations', 'PageController@view_rorganizations')->name('rorganizations');

	Route::post('/rorganizations', 'PageController@register_organizations')->name('rorganizations');

	Route::get('/uorganizations/{id}', 'PageController@view_uorganizations')->name('uorganizations');

	Route::post('/uorganizations/{id}', 'PageController@update_organizations')->name('uorganizations');

	Route::get('/dorganizations/{id}', 'PageController@view_dorganizations')->name('dorganizations');

	Route::post('/dorganizations/{id}', 'PageController@delete_organizations')->name('dorganizations');

	Route::get('/initiatives', 'PageController@view_initiatives')->name('initiatives');

	Route::get('/rinitiatives', 'PageController@view_rinitiatives')->name('rinitiatives');

	Route::post('/rinitiatives', 'PageController@register_initiatives')->name('rinitiatives');

	Route::get('/uinitiatives/{id}', 'PageController@view_uinitiatives')->name('uinitiatives');

	Route::post('/uinitiatives/{id}', 'PageController@update_initiatives')->name('uinitiatives');

	Route::get('/dinitiatives/{id}', 'PageController@view_dinitiatives')->name('dinitiatives');

	Route::post('/dinitiatives/{id}', 'PageController@delete_initiatives')->name('dinitiatives');

	Route::get('/detailorga/{id}', 'PageController@view_detailorga')->name('detailorga');

	Route::get('/godparents', 'PageController@view_godparents')->name('godparents');

	Route::get('/rgodparents', 'PageController@view_rgodparents')->name('rgodparents');

	Route::post('/rgodparents', 'PageController@register_godparents')->name('rgodparents');

	Route::get('/ugodparents/{id}', 'PageController@view_ugodparents')->name('ugodparents');

	Route::post('/ugodparents/{id}', 'PageController@update_godparents')->name('ugodparents');

	Route::get('/dgodparents/{id}', 'PageController@view_dgodparents')->name('dgodparents');

	Route::post('/dgodparents/{id}', 'PageController@delete_godparents')->name('dgodparents');

	Route::get('/detailgodparent/{id}', 'PageController@view_detailgodparent')->name('detailgodparent');

	Route::get('/galphabetical', 'PageController@view_galphabetical')->name('galphabetical');

	Route::post('/galphabetical', 'PageController@order_galphabetical')->name('galphabetical');

	Route::get('/gstates', 'PageController@view_gstates')->name('gstates');

	Route::post('/gstates', 'PageController@order_gstates')->name('gstates');

	Route::get('/gsectors', 'PageController@view_gsectors')->name('gsectors');

	Route::post('/gsectors', 'PageController@order_gsectors')->name('gsectors');

});

Route::get('404', function(){
    abort(404);
});
