<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth')->get('/user', function (Request $request) {
    return auth()->user();
});


Route::middleware('auth')->post('/message/send','API\chatController@sendMessage');

Route::middleware('auth')->get('/messages','API\chatController@getMessagesAuth')->name('messsages');

Route::middleware('auth')->post('/message/{id}','API\chatController@getMessagesAuthToUser');

Route::middleware('auth')->post('/read/message/{id}','API\chatController@readMessage');

Route::middleware('auth')->post('/read/messages/{id}','API\chatController@readMessages');
Route::middleware('auth')->get('/getUser/{id}','API\chatController@getUser');