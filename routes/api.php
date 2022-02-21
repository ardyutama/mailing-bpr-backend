<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InboxMailController;
use App\Models\Employee;
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
    Route::post('/register','register');
});

Route::get('/inbox', [InboxMailController::class, 'index']);

Route::controller(InboxMailController::class)->group(function(){
    Route::get('Inbox/{id}','show');
});