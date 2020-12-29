<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoutiqueController;
use \App\Http\Middleware\BoutiqueMiddleware;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\RealaController;

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

/**
 * Boutiques
 */
Route::get('/boutiques', [BoutiqueController::class, 'index']);
// Route::post('/boutique/new', [BoutiqueController::class, 'store'] )->middleware([BoutiqueMiddleware::class]);
Route::post('/boutique/new', [RealaController::class, 'store'] );

/**
 * User
 */
Route::post('/register', [AuthenticateController::class, 'register']);
Route::post('/login', [AuthenticateController::class, 'login']);

/**
 * Laravel example
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
