<?php

use App\Http\Controllers\ApproverController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DispositionMailController;
use App\Http\Controllers\DispositionRegisterController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Models\DispositionRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register','store');
    Route::post('/logout', 'logout');
});

Route::controller(NotaController::class)->group(function(){
        Route::get('/nota/masuk/{division_id}', 'notaMasuk');
        Route::get('/nota/keluar/{division_id}', 'notaKeluar');
        Route::get('/nota/pending/{division_id}', 'notaPending');
        Route::post('/nota', 'create');
});

Route::controller(DispositionRegisterController::class)->group(function () {
    Route::get('/disposition/{id}', 'show');
    Route::post('/dispositionRegister','store');
});
Route::controller(DispositionMailController::class)->group(function () {
    Route::post('/dispositionMail', 'store');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/coba', 'create');
    Route::get('/user/{id}', 'show');
    Route::get('/user/role/{roles_id}', 'roles');
    Route::get('/user/division/{division_id}', 'division');
});

Route::controller(DivisionController::class)->group(function () {
    Route::get('/division', 'index');
    Route::get('/division/{id}', 'show');
});

Route::controller(ApproverController::class)->group(function () {
    Route::post('/approver','create');
    Route::get('/approver/{id}','show');
    Route::post('/approver/{user_id}/{nota_id}','update');
});