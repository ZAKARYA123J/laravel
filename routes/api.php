<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\PrintchequeController;
use App\Models\Printcheque;
use App\Models\Societe;
use Illuminate\Http\Request;
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
Route::get('test', function () {
    return ('welcome');
});
Route::prefix('societes')->group(function () {
    Route::get('/', [SocieteController::class, 'index']);
    Route::get('/{id}', [SocieteController::class, 'show']);
    Route::post('/create', [SocieteController::class, 'create']);
    Route::delete('/delete/{id}', [SocieteController::class, 'destroy']);
    Route::put('/{id}', [SocieteController::class, 'update']);
});
Route::prefix('banque')->group(function () {
    Route::get('/', [BanqueController::class, 'index']);
    Route::get('/{id}',[BanqueController::class,'show']);
    Route::post('/',[BanqueController::class,'store']);
    Route::delete('/{id}',[BanqueController::class,'destroy']);
});

Route::prefix('comptes')->group(function(){
    Route::get('/', 'App\Http\Controllers\CompteController@index');
    Route::get('/{id}','App\Http\Controllers\CompteController@show');
    Route::post('/',[CompteController::class,'store']);
    Route::put('/update/{id}',[CompteController::class,'update']);
    Route::delete('/{id}', [CompteController::class, 'destroy']);
});

Route::prefix('carnets')->group(function(){
    Route::get('/',[CarnetController::class,'index']);
    Route::get('/{id}',[CarnetController::class,'show']);
    Route::post('/',[CarnetController::class,'store']);
    Route::put('/update/{id}',[CarnetController::class,'update']);
    Route::delete('/{id}',[CarnetController::class,'destroy']);
});
Route::prefix('cheques')->group(function(){
    Route::get('/',[ChequeController::class,'index']);
    Route::get('/{id}',[ChequeController::class,'show']);
    Route::post('/store',[ChequeController::class,'store']);
    Route::put('/update/{id}',[ChequeController::class,'update']);
    Route::delete('/{id}',[ChequeController::class,'destroy']);
    // Route::post('/print-check/{carnet_id}', [ChequeController::class, 'printCheck']);
});
Route::prefix('print')->group(function(){
    Route::get('/',[PrintchequeController::class,'index']);
    Route::post('/',[PrintchequeController::class,'store']);
});