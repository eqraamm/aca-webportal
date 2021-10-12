<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SppaController;
use App\Http\Controllers\SurveyController;
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
    // Route::get('/dashboard', 'AuthController@showFormWelcome');
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

    Route::get('/getlistprofile', 'ProfileController@getlistProfile')->name('listprofile');
    Route::get('/getlistcountry', 'ProfileController@getlistcountry')->name('listcountry');
    Route::get('/getlistProvince', 'ProfileController@getlistProvince')->name('listprovince');
    Route::get('/getlistCGroup', 'ProfileController@getlistCGroup')->name('listcgroup');
    Route::get('/getlistSCGroup', 'ProfileController@getlistSCGroup')->name('listscgroup');
    Route::get('/getlistOccupation', 'ProfileController@getlistOccupation')->name('listoccupation');

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
    // qRoute::get('/transaction', 'SppaController@sppa')->name('inquiry.transaction');
    Route::get('/transaction', 'SppaController@showFormPolicy')->name('policy.transaction');
    Route::get('/Inquiry', 'InquiryController@inquiry');
    Route::POST('/tempsubmitpolicy', 'SppaController@TempSubmitPolicy')->name('policy.tempsubmitpolicy');
    Route::POST('/revisepolicy', 'SppaController@RevisePolicy')->name('policy.revisepolicy');
    Route::POST('/submitpolicyconfirmation', 'SppaController@SubmitPolicyConfirmation')->name('policy.submitpolicyconfirmation');

    Route::get('/getlistmo', 'SppaController@getlistMo')->name('listmo');
    Route::get('/getlistbranch', 'SppaController@getlistbranch')->name('listbranch');
    Route::get('/getlistcurrency', 'SppaController@getlistcurrency')->name('listcurrency');
    Route::get('/getlistprofile', 'SppaController@getlistprofile')->name('listprofile');
    Route::get('/getlistsegment', 'SppaController@getlistsegment')->name('listsegment');
    Route::get('/getlistct', 'SppaController@getlistct')->name('listct');
    Route::get('/getlistagent', 'SppaController@getlistagent')->name('listagent');
    Route::get('/getlistproduct', 'SppaController@getlistproduct')->name('listproduct');
    Route::get('/getlistcoverage', 'SppaController@getlistcoverage')->name('listcoverage');
    Route::get('/getlistgendtab', 'SppaController@getlistgendtab')->name('listgendtab');

    Route::post('/docpreview', 'SppaController@getDocumentPreview')->name('docpreview');

    // Index Survey
    Route::get('/survey', 'SurveyController@showsurvey')->name('survey');
    Route::post('/emailsurvey', 'SurveyController@SubmitSurvey')->name('survey.submitsurvey');

    // index report
    Route::get('/report', 'ReportController@Retrive')->name('retrive');
});

// Route::get('/sppadoc/{data}', 'SppaController@getPolicyDoc')->name('sppadoc');
Route::get('/sppadoc', 'SppaController@getPolicyDoc')->name('sppadoc');
Route::POST('/submitsppadoc', 'SppaController@SubmitPolicyDocSPPA')->name('submitsppadoc');
// Route::view('/sppadoc', 'Transaction.PolicyDocSPPA');
Route::get('/sppadocold/{data}', 'SppaController@getPolicyDoc')->name('sppadocold');
// Route::view('/sppadocold', 'Transaction.backupdocsppa');

