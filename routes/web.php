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
Route::prefix('/notification/send')->group(function(){
    Route::get('/email','NotificationController@home')->name('notifiction.form.index');
    Route::get('/sms','NotificationController@smsFrom')->name('notifiction.form.sms');
    Route::post('/email','NotificationController@sendEmail')->name('notifiction.send.email');
    Route::post('/sms','NotificationController@sendSms')->name('notifiction.send.sms');
});

