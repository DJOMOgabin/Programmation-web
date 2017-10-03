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
    return view('home');
});

Route::get('salut', function () {
    return 'Salut les gens';
});

/*Route::get('salut/{name}',function($name){
    return "Salut $name !!!!!";
});*/
Route::group(['prefix' => 'info', 'middleware' => 'ip'], function () {
    Route::get('salut/{name}-{id}', function ($slug, $id) {
        return "Slug: $slug, ID: $id";
    })->where('name', '[a-z0-9\-]+')->where('id', '[0-9]+');
});


Route::get('testWelcome','WelcomeController@index');
//Route::get('home','HomeController@index');


Auth::routes();

Route::group(['prefix'=>'admin'],function (){
    Route::get('home',['as' => 'AdminHome','uses' =>'AdminController@Home']);
    Route::get('create',['as'=>'create','uses'=>'AdminController@Create']);
    Route::post('save',['as'=>'save','uses'=>'AdminController@Save']);

    Route::get('detail',['as'=>'detail','uses'=>'AdminController@detail']);
    Route::post('Apply',['uses'=>'AdminController@apply']);
    Route::get('Apply',['uses'=>'AdminController@apply']);
});
Route::get('/home', 'HomeController@index');
Route::get('/defaultServices', 'RegisterComplet@index');
Route::get('/store', 'RegisterComplet@store');
Route::get('/defaultSettings', 'RegisterComplet@settings');
Route::get('/researchResults', 'RegisterComplet@results');
Route::post('/defaultSettings', 'RegisterComplet@addcolor');
/*Route::post('/defaultServices/add/{id}/{price}', 'RegisterComplet@index');
Route::post('/defaultServices/remove/{id}', 'RegisterComplet@remove');*/
Route::post('/defaultServices/add', 'RegisterComplet@add');
Route::post('/defaultServices/addcolor', 'RegisterComplet@addcolor');
Route::post('/defaultServices/remove', 'RegisterComplet@remove');
