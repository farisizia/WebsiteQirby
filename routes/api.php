<?php

use App\Http\Controllers\Api\PropertyAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'property'], function () {
    Route::get('/', [PropertyController::class, 'index'])->name('property.view');
});

Route::get('property',[PropertyAPI::class,'index']);
Route::get('property/{id}',[PropertyAPI::class,'show']);
Route::post('property',[PropertyAPI::class,'store']);