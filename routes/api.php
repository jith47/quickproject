<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTechnicianController;
use App\Http\Controllers\FunController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

// Route::get('/sanctum/csrf-cookie', function (Request $request) {
//     return response()->json(['message' => 'CSRF cookie set']);
// });
Route::get('test', [UserController::class, 'test']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);
    Route::post('get_users', [UserController::class, 'users']);
    Route::post('get_users_by_company', [UserController::class, 'companyUsers']);
    Route::apiResource('services', ServiceController::class);
    Route::post('get_users_by_company', [UserController::class, 'companyUsers']);
    Route::post('profile_pic', [UserController::class, 'updateProfilePic']);
    Route::apiResource('technician', ServiceTechnicianController::class);
    Route::get('mostliked', [ServiceTechnicianController::class, 'mostliked']);
    Route::get('recentlyclosed', [ServiceController::class, 'recentlyclosed']);
    Route::get('weeklyreaction', [FunController::class, 'weeklyreaction']);
});


