<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DispatchController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["middleware" => ["noStore"]], function(){
    
    Route::get("login", [LoginController::class, "index"])->name("login");
    Route::post("login", [LoginController::class, "login"]);
    
    
    Route::group(["middleware" => ["auth"], "prefix" => "admin"], function () {
        Route::get('/', function () {
            return view('home');
        })->name("home");
        
        Route::get("logout", [LoginController::class, "logout"])->name("logout");


        Route::group(["prefix" => "events", "as" => "events."], function(){
            Route::get("/", [EventController::class, "index"])->name("index");

            // Route::get("/show/{id}", [EventController::class, "show"])->name("show");

            Route::get("/create", [EventController::class, "create"])->name("create");
            Route::post("/create", [EventController::class, "store"]);
        
            Route::get("/edit/{id}", [EventController::class, "edit"])->name("edit");
            Route::post("/edit/{id}", [EventController::class, "update"]);
            
            Route::delete("/delete/{id}", [EventController::class, "delete"])->name("delete");
        });


        Route::group(["prefix" => "workers", "as" => "workers."], function(){
            Route::get("/", [WorkerController::class, "index"])->name("index");

            // Route::get("/show/{id}", [WorkerController::class, "show"])->name("show");

            Route::get("/create", [WorkerController::class, "create"])->name("create");
            Route::post("/create", [WorkerController::class, "store"]);
        
            // Route::get("/edit/{id}", [WorkerController::class, "edit"])->name("edit");
            // Route::post("/edit/{id}", [WorkerController::class, "update"]);
            
            Route::delete("/delete/{id}", [WorkerController::class, "delete"])->name("delete");
        });


        Route::group(["prefix" => "dispatches", "as" => "dispatches."], function(){
            Route::get("/", [DispatchController::class, "index"])->name("index");

            // Route::get("/show/{id}", [DispatchController::class, "show"])->name("show");

            Route::get("/create", [DispatchController::class, "create"])->name("create");
            Route::post("/create", [DispatchController::class, "store"]);
        
            // Route::get("/edit/{id}", [DispatchController::class, "edit"])->name("edit");
            // Route::post("/edit/{id}", [DispatchController::class, "update"]);
            
            Route::delete("/delete/{id}", [DispatchController::class, "delete"])->name("delete");
        });
    
    });
    
});