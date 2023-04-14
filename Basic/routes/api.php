<?php

use App\Http\Controllers\PaymentController;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AccountController;
use App\Console\Kernel;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('open-testing')->middleware(
    [
        'basic_auth'
    ]
)->namespace('App\Http\Controllers')->group(function ($api){
    $api->get('/createVirtualAccount', 'AccountController@createVirtualAccount');
    $api->get('/getVirtualAccountBalance', 'AccountController@getVirtualAccountBalance');
    $api->post('/createPaymentToken', 'PaymentController@createPaymentToken');
});
Route::post('/registration',[UserController::class,'registration']);
Route::post('/login',[UserController::class,'login']);
Route::post('/createPaymentToken',[PaymentController::class,'createPaymentToken']);
Route::post('/receivedResponseFromServer',[PaymentController::class,'receivedResponseFromServer']);


