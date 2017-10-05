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

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(url('manager'));
});

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'auth'], function(){
    Route::get('/', 'IndexController@index');
    Route::get('/detail/{id}', 'AppController@index');
    Route::get('/edit/{id}', 'AppController@editPage');
    Route::post('/file', 'FileController@upload');
    Route::post('/edit', 'AppController@store');

    Route::get('/add/{id}/ios', 'AppController@iosAddPage');
    Route::get('/add/{id}/android', 'AppController@androidAddPage');

    Route::post('/add', 'AppController@add');
    Route::get('/showLog/{id}/{type}', 'AppController@showLog');

    Route::get('/editLog/{id}', 'AppController@editLogPage');
    Route::post('/editLog', 'AppController@editLog');

    Route::delete('/deleteLog/{id}', 'AppController@deleteLog');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', function(){
    Auth::logout();
    return redirect("/login");
});
//Route::get('test', function(){
//    return response()->json([
//        'json'  =>  User::create([
//            'username' => "twtmobile",
//            'password' => bcrypt("twtmobile12435678!@#"),
//        ])
//    ]);
//});
