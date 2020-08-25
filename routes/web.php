<?php

use App\Mail\CreateUser;
use App\Services\Notification\Notification;
use App\User;
use Illuminate\Support\Facades\Mail;
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

Route::prefix('admin')->middleware('web')->group(function () {
    Route::get('',function(){
        return response('جواب درخواست',201);
    });
});

Route::get('/login',"HomeController@login");
Route::post('/login','HomeController@store');

Route::get('/','HomeController@index')->name('home.index');

Route::get('/notification/send-email','NotificationController@home')->name('notifiction.form.index');
Route::get('/notification/send-sms','NotificationController@smsFrom')->name('notifiction.form.sms');
Route::post('/notification/send-email','NotificationController@sendEmail')->name('notifiction.send.email');
Route::post('/notification/send-sms','NotificationController@sendSms')->name('notifiction.send.sms');




