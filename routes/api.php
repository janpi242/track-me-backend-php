<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;


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

// Route::get('/products', function () {
//     return 'products';
// });

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth')->post('location', [LocationController::class, 'store']);

Route::post('login', [AuthController::class, 'login']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {
    
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// $this->post('register', 'Auth\AuthController@register');