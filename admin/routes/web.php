<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
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

Route::get('/', [HomeController::class, "homeIndex"])->middleware("loginCheck");

Route::get('/visitor', [VisitorController::class, "visitorIndex"])->middleware("loginCheck");

/*Admin Service Management */
Route::get('/services', [ServicesController::class, "serviceIndex"])->middleware("loginCheck");
Route::get('/getservicedata', [ServicesController::class, "getServiceData"])->middleware("loginCheck");
Route::post('/servicedelete', [ServicesController::class, "serviceDelete"])->middleware("loginCheck");
Route::post('/serviceDetails', [ServicesController::class, "getServiceDetails"])->middleware("loginCheck");
Route::post('/serviceUpdate', [ServicesController::class, "serviceUpdate"])->middleware("loginCheck");
Route::post('/serviceAdd', [ServicesController::class, "serviceAdd"])->middleware("loginCheck");

/*Admin Course Management */
Route::get('/courses', [CoursesController::class, "courseIndex"])->middleware("loginCheck");
Route::get('/getcoursedata', [CoursesController::class, "getCourseData"])->middleware("loginCheck");
Route::post('/coursedelete', [CoursesController::class, "courseDelete"])->middleware("loginCheck");
Route::post('/courseDetails', [CoursesController::class, "getCoursesDetails"])->middleware("loginCheck");
Route::post('/courseUpdate', [CoursesController::class, "courseUpdate"])->middleware("loginCheck");
Route::post('/courseAdd', [CoursesController::class, "courseAdd"])->middleware("loginCheck");

/* Admin Photo Management */
Route::get('/photo', [PhotoController::class, "photoIndex"])->middleware("loginCheck");
Route::get('/photojson', [PhotoController::class, "photoJSON"])->middleware("loginCheck");
Route::get('/photojsonbyid/{id}', [PhotoController::class, "photoJSONById"])->middleware("loginCheck");
Route::post('/photouplaod', [PhotoController::class, "photoUplaod"])->middleware("loginCheck");
Route::post('/photodelete', [PhotoController::class, "photoDelete"])->middleware("loginCheck");

/* Login */
Route::get('/login', [LoginController::class, "loginPage"]);
Route::get('/logout', [LoginController::class, "onLogout"]);
Route::post('/onLogin', [LoginController::class, "onLogin"]);



