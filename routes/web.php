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

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: http://localhost:8000');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token,Authorization');
header('Access-Control-Allow-Credentials: true');

Route::get('/', function () {
    return view('main');
});

Route::group(['middleware' => 'cors'], function() {
   Route::get('/movies/{page}', 'MovieController@get_movies_api');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
