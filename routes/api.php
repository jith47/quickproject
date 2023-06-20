<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);
});
// Route::prefix('V1')->group(function () {
//     Route::apiResource('skills', SkillController::class);
// });
// Route::group(['prefix' => 'V1'], function () {
// });


