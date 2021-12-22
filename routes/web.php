<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;

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

//Login
Route::get('/login', [UserController::class, 'index'])->middleware('guest');

Route::post('/loginValidation', [UserController::class, 'loginValidation']);

//Logout
Route::get('/logout', [UserController::class, 'logout']);

//Register
Route::get('/register', [UserController::class, 'create']);

Route::post('/registerValidation', [UserController::class, 'registerValidation']);

//Change Password
Route::get('/changePassword', [UserController::class, 'changePassword']);

Route::post('/changePasswordValidation', [UserController::class, 'updatePassword']);

//Home
Route::get('/', [CategoryController::class, 'index']);

Route::get('/category/{category_name}', [CategoryController::class, 'show']);

Route::post('/updateCategory', [CategoryController::class, 'update']);

Route::post('/deleteCategory/{id}', [CategoryController::class, 'destroy']);

//Keyboard Page
Route::get('/category/{category_name}/keyboard/{keyboard_name}', [KeyboardController::class, 'show']);

Route::get('/addKeyboard', [KeyboardController::class, 'index']);

Route::post('/insertKeyboard', [KeyboardController::class, 'store']);

Route::post('/updateKeyboard', [KeyboardController::class, 'update']);

Route::post('/deleteKeyboard/{id}', [KeyboardController::class, 'destroy']);

//Search
Route::get('/category/{category_name}/name', [KeyboardController::class, 'searchByName']);

Route::get('/category/{category_name}/price', [KeyboardController::class, 'searchByPrice']);

//Cart
Route::get('/myCart', [CartController::class, 'index']);

Route::post('/addToCart/{id}', [CartController::class, 'store']);

Route::post('/myCart/{keyboard_id}', [CartController::class, 'update']);

//History
Route::get('/transactionHistory', [HistoryController::class, 'index']);

Route::get('/checkout', [HistoryController::class, 'store']);

Route::get('/viewTransactionHistory/{id}', [HistoryController::class, 'show']);
