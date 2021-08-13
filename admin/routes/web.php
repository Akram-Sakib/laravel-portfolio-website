<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

/*Admin Service Management */
Route::get('/services', [ServicesController::class, "serviceIndex"]);
Route::get('/getservicedata', [ServicesController::class, "getServiceData"]);
Route::post('/servicedelete', [ServicesController::class, "serviceDelete"]);
Route::post('/serviceDetails', [ServicesController::class, "getServiceDetails"]);
Route::post('/serviceUpdate', [ServicesController::class, "serviceUpdate"]);
Route::post('/serviceAdd', [ServicesController::class, "serviceAdd"]);

/*Admin Course Management */
Route::get('/courses', [CoursesController::class, "courseIndex"]);
Route::get('/getcoursedata', [CoursesController::class, "getCourseData"]);
Route::post('/coursedelete', [CoursesController::class, "courseDelete"]);
Route::post('/courseDetails', [CoursesController::class, "getCoursesDetails"]);
Route::post('/courseUpdate', [CoursesController::class, "courseUpdate"]);
Route::post('/courseAdd', [CoursesController::class, "courseAdd"]);

/* Login */
Route::get('/login', [LoginController::class, "loginPage"]);
Route::get('/onlogin', [LoginController::class, "onLogin"]);

