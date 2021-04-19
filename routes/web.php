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

//homepage
Route::get('/', 'HomeController@index')->name('home');

//load email's data
Route::post('/load-mail', 'MailController@loadMail')->name('load-mail');

//process mail response message
Route::post('/mail-response', 'MailController@mailResponse')->name('mail-response');
