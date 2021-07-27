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
    // view dashboard
    Route::get('/dashboard', 'AuthController@showFormWelcome');
    // data dashboard
    Route::get('/dashboard', 'IndexController@index')->name('dashboard');
    // Index Profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    //Drop Profile
    Route::get('/profile/drop/{id}', 'ProfileController@dropProfile')->name('profile.drop');
    //Save Profile
    Route::post('/profile', 'ProfileController@SaveProfile')->name('profile.save');
    //History Profile
    Route::get('/profile/history/{id}', 'ProfileController@historyProfile')->name('profile.history');
    //List Ref Profile For Sync
    Route::post('/profile/sync', 'ProfileController@listRefProfile')->name('profile.sync');
    //Upload Profile document    
    Route::get('/profile/uploadDocument', function (){
        return view('uploadProfileDoc');
    })->name('profile.uploadDocument');
    
    Route::get('/profile/sync/{id}', function(){
        return Route::input('id');
    })->name("profile.getsync");

    Route::post('/profile/uploadDocument', 'ProfileController@uploadProfileDocument')->name('profile.uploadDocumentPost');

     // Index Transaction
    // qRoute::get('/transaction', 'SppaController@sppa')->name('inquiry.transaction');
    Route::get('/transaction', 'SppaController@showFormPolicy')->name('policy.transaction');
    Route::get('/Inquiry', 'InquiryController@inquiry');
});

