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
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('profile', 'ProfileController@CreateProfile')->name('profile');
Route::get('profile/{id}', 'ProfileController@detailProfile')->name('dropProfile');
Route::post('profile', 'ProfileController@SaveProfile');
// route::get('profile', 'ProfileController@DetailProfile');
// route::post('profile', 'ProfileController@Droptable');
Route::get('sppa', 'SppaController@Sppa');
Route::get('Inquiry', 'InquiryController@inquiry');
