<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::post('/login', [MainController::class, 'userLogin']);

Route::group(['middleware' => ['auth:sanctum']], function(){
	Route::post('/logout', [MainController::class, 'logout']);
	Route::post('/booking', [MainController::class, 'booking']);
	Route::get('/users', [MainController::class, 'getData']);
	Route::get('/retailer', [MainController::class, 'getRetailer']);
});