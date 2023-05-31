<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::get("/", [\App\Http\Controllers\DataController::class, "index"])->name("main")->middleware("auth");
Route::get("/create", [\App\Http\Controllers\DataController::class, "create"])->name("create")->middleware("auth");
Route::post("/upload", [\App\Http\Controllers\DataController::class, "store"])->name("upload")->middleware("auth");

Route::get('/{id}/edit', [DataController::class, 'edit'])->name('data.edit');

Route::put('/{id}', [DataController::class, 'update'])->name('data.update');

Route::delete('/{id}', [DataController::class, 'destroy'])->name('data.destroy');

Route::post('/comments', [DataController::class, 'storecomment'])->name('comments.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
