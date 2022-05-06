<?php

use App\Http\Controllers\AuthorController;
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

Route::post("/author/register", [AuthorController::class, "register"]);
Route::post("/author/login", [AuthorController::class, "login"]);

Route::middleware("auth:api")->group(function () {
    Route::get("/author", [AuthorController::class, "profile"]);
    Route::get("/author/logout", [AuthorController::class, "logout"]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
