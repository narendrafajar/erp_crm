<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerRegistrationController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// Rute untuk registrasi customer
Route::post('/register-customer', [CustomerRegistrationController::class, 'register']);

// Rute untuk memproses transaksi
Route::post('/process-transaction', [TransactionController::class, 'process']);
