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
    return view('welcome');
});


Route::get('landing', function () {
    return view('landing');
});

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')-> middleware('verified');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// facebook

// Route::get('redirect/{service}', 'SocialController@redirect');
// Route::get('callback/{service}', 'SocialController@callback');

Route::get('login/facebook', [App\Http\Controllers\SocialController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\SocialController::class,'handleFacebookCallback']);


Route::get('filable', 'CrudController@getOffers');


Route::group(['prefix'=>'offers'],function () {
        // route::get('store','CrudController@store');

        route::get('create','CrudController@create');
        route::post('store','CrudController@store');

});