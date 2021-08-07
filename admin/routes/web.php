<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VisitorController;
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

Route::get('/', [HomeController::class, "homeIndex"]);

Route::get('/visitor', [VisitorController::class, "visitorIndex"]);

Route::get('/services', [ServicesController::class, "serviceIndex"]);

Route::get('/getservicedata', [ServicesController::class, "getServiceData"]);

Route::get('/servicedelete', [ServicesController::class, "serviceDelete"]);
