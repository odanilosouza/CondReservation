<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::middleware('auth:api')->group(function () {
Route::post('/auth/validate', [AuthController::class, 'validateToken']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
|
 */

// Route::get('/', function () {
//     return view('home');
// });

use App\Http\Controllers\AuthController;

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'mostrarView']);

Route::post('/register', [AuthController::class, 'home']);
Route::get('/register', [AuthController::class, 'viewRegister']);

Route::get('/', [AuthController::class, 'home']);
