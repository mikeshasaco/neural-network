<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartContractController;
use App\Http\Controllers\TokenController;

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

// ...


Route::get('/', function () {
    return view('welcome');
});
Route::get('/token-transactions', [TokenController::class, 'index']);
Route::get('/smart-contract-search', [SmartContractController::class, 'index']);
Route::post('/smart-contract-search', [SmartContractController::class, 'search']);
Route::get('/token-balance', [SmartContractController::class, 'getTokenBalance']);
