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
    Route::get('/transaction', 'SppaController@showFormPolicy')->name('policy.transaction');
    Route::get('/Inquiry', 'InquiryController@inquiry');
    Route::POST('/premiumsimulation', 'SppaController@PremiumSimulation')->name('policy.premiumSimulation');
    Route::POST('/getnewpolicyno', 'SppaController@GetNewPolicyNo')->name('policy.getnewpolicyno');
    Route::POST('/savepolicydocument', 'SppaController@SavePoicyDocument')->name('policy.savepolicydocument');
    Route::get('/modalupload', 'SppaController@showModalUpload')->name('policy.modalupload');
    Route::POST('/SavePolicy', 'SppaController@SavePolicy')->name('policy.savepolicy');
    Route::POST('/submitpolicy', 'SppaController@SubmitPolicy')->name('policy.submitpolicy');
    Route::POST('/droppolicy', 'SppaController@DropPolicy')->name('policy.drop');
    Route::get('/listpolicy', 'SppaController@showListPolicy')->name('policy.listPolicy');
});

