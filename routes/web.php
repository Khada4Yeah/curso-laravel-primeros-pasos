<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

// Route::get("/dashboard", function () {
//     return view("dashboard");
// })
//     ->middleware(["auth"])
//     ->name("dashboard");

require __DIR__ . "/auth.php";

//Usar middleware especifico
// Route::middleware([TestMiddleware::class])->group(function () {
//     Route::get("/tests/{id?}/{name}", function ($id = 10, $name = "pepe") {
//         echo $id;
//         echo $name;
//     });
// });

//Darle un prefijo a las rutas
Route::group(["prefix" => "dashboard", "middleware" => "auth"], function () {
    Route::get("/", function () {
        return view("dashboard");
    })->name("dashboard");
    Route::resource("post", PostController::class);
    Route::resource("category", CategoryController::class);
});

// Route::resource("post", PostController::class);
// Route::resource("category", CategoryController::class);