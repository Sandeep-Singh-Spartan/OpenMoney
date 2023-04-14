<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration', function () {
    return view('Registration');
});
Route::get('/login', function () {
    return view('Login');
});
Route::get('/VirtualAccount', function () {
    return view('VirtualAccount');
});
Route::get('/CreateVirtualAccount', function () {
    return view('CreateVirtualAccount');
});

Route::get('/Product', function () {
    return view('Product');
});
Route::get('/layer', function () {
    return view('layer');
});
Route::get('/PaymentResult', function () {
    return view('PaymentResult');
});
