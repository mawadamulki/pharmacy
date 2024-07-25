<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\OrderController;

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

Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function(){
    Route::get("logout", [ApiController::class, "logout"]);

    Route::post("CreateMedicine",[MedicineController::class,"CreateMedicine"]);
    Route::get("getClassification",[MedicineController::class,"getClassification"]);
    Route::get("getMedicinesByClassification/{classification}",[MedicineController::class,"getMedicinesByClassification"]);
    Route::get("MedicineDetail/{id}",[MedicineController::class,"MedicineDetail"]);
    Route::get("browseMedicine",[MedicineController::class,"browseMedicine"]);
    Route::get("search/{name}",[MedicineController::class,"search"]);
    Route::get("addToFavorite/{id}",[MedicineController::class,"addToFavorite"]);
    Route::get("showFavoritesForPharmacist",[MedicineController::class,"showFavoritesForPharmacist"]);

    Route::post("addOrder",[OrderController::class,"addOrder"]);
    Route::get("showOrders",[OrderController::class,"showOrders"]);
    Route::get("showAllOrders",[OrderController::class,"showAllOrders"]);
    Route::post("editOrder/{id}",[OrderController::class,"editOrder"]);
    Route::get("getOrdersSummary/{startTime}/{endTime}", [OrderController::class, "getOrdersSummary"]);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
