<?php

use App\Http\Controllers\ApproverController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DispositionMailController;
use App\Http\Controllers\DispositionRegisterController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InboxMailController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\OutwardMailController;
use App\Http\Controllers\TypeMailController;
use App\Http\Controllers\UserController;
use App\Models\DispositionRegister;
use App\Models\Employee;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function (Request $request) {
//         return auth()->user();
//     });
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register','store');
    Route::post('/logout', 'logout');
});

Route::controller(NotaController::class)->group(function(){
        Route::get('/nota/keluar/{id}','show');
        Route::get('/nota/masuk/{id}', 'notaMasuk');
        Route::get('/nota/keluar/{id}', 'notaKeluar');
        Route::get('/nota/pending/{id}', 'notaPending');
        Route::post('/nota', 'create');
        Route::get('/coba/keluar/{id}', 'notaCoba');
        // Route::get('/approver/{user_id}', 'approver');
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
    Route::get('/user/role/{id}', 'roles');
    Route::get('/user/role/{roles_id}/division/{division_id}', 'users');
});

Route::controller(DivisionController::class)->group(function () {
    Route::get('/division/{user_id}', 'show');
});

Route::controller(ApproverController::class)->group(function () {
    Route::post('/approver','create');
    Route::get('/approver/{user_id}','show');
    Route::post('/approver/{user_id}/{nota_id}','update');
});
// Route::group(['middleware' => ['auth:sanctum']], function() {
    // Route::get('/inbox', [InboxMailController::class, 'index']);
    // Route::controller(InboxMailController::class)->group(function(){
    //     Route::get('/inbox/{id}','show');
    //     Route::get('/inbox/{id}/detail','detail');
    //     Route::post('/inbox', 'create');
    // });
    // Route::controller(OutwardMailController::class)->group(function () {
    //     Route::get('/outward/{id}', 'show');
    //     Route::post('/outward', 'create');
    // });
    // Route::controller(EmployeeController::class)->group(function () {
    //     Route::get('/employee', 'index');
    //     Route::get('/employee/{id}', 'show');
    //     // Route::post('/outward', 'create');
    // });
    // Route::controller(TypeMailController::class)->group(function () {
    //     Route::get('/typemail', 'index');
    //     // Route::post('/outward', 'create');
    // });
// });