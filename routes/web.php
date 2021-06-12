<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SppaController;
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

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('/login', 'AuthController@showFormLogin')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');


Route::group(['middleware' => 'CekLogin'], function(){
    // Index Profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    //Drop Profile
    Route::get('/profile/drop/{id}', 'ProfileController@dropProfile')->name('profile.drop');
    //Save Profile
    Route::post('/profile', 'ProfileController@SaveProfile')->name('profile.save');
    //History Profile
    Route::get('/profile/history/{id}', 'ProfileController@historyProfile')->name('profile.history');
    Route::get('/test', 'ProfileController@test')->name('test');
    Route::get('/sppa', 'SppaController@Sppa');
    Route::get('/Inquiry', 'InquiryController@inquiry');
});

