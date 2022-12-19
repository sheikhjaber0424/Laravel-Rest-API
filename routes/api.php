<?php

use App\Http\Resources\ImageResource;
use App\Models\PublicImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//normal route
// Route::get('img_data', [Api\MainController::class, 'index']);

//Api resource route
Route::apiResource('images', Api\MainController::class);