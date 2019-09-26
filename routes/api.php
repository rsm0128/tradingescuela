<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Telegram
Route::post(env('TELEGRAM_TOKEN'), ['as'=>'telegram-update','uses'=>'TelegramController@responseUpdate']);


//temp
Route::get('/test', ['as'=>'test-telegram','uses'=>'TelegramController@testFunction']);