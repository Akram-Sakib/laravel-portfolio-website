<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TermsController;
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

Route::get('/', [HomeController::class, "HomeIndex"]);
Route::get('/courses', [CoursesController::class, "CoursePage"]);
Route::get('/policy', [PolicyController::class, "PolicyPage"]);
Route::get('/projects', [ProjectsController::class, "ProjectsPage"]);
Route::get('/terms', [TermsController::class, "TermsPage"]);
Route::get("/contact",[ContactController::class, "ContactPage"]);

Route::post("/contactSend", [HomeController::class, "contactSend"]);
