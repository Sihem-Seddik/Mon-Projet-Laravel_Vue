<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\AuthController;


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
Route::group([
 'middleware' => 'api',
 'prefix' => 'auth'
], function ($router) {
 Route::post('/login', [AuthController::class, 'login']);
 Route::post('/register', [AuthController::class, 'register']);
 Route::post('/logout', [AuthController::class, 'logout']);
 Route::post('/refresh', [AuthController::class, 'refresh']);
 Route::get('/user-profile', [AuthController::class, 'userProfile']);
}); 


Route::middleware('api')->group(function () {
Route::resource('employes', EmployeController::class);
});


Route::middleware('api')->group(function () {
Route::resource('departements',
DepartementController::class);
});
Route::get('/dep/{idsoci}',
[DepartementController::class,'showDepartementBySoci']);


Route::middleware('api')->group(function () {
Route::resource('societes', SocieteController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
