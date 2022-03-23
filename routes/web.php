<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;

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

Route::get('/', [MovieController::class, 'index']);
Route::get('show/{movie}', [MovieController::class, 'show'])->name('show');

Route::get('actors', [ActorController::class, 'index']);
Route::get('actors/page/{page?}', [ActorController::class, 'index']);
Route::get('show/actor/{actor}', [ActorController::class, 'show'])->name('actor.show');

Route::get('tvshows', [TvController::class, 'index']);
// Route::get('tvshows/page/{page?}', [TvController::class, 'index']);
Route::get('show/tv/{tv}', [TvController::class, 'show'])->name('tv.show');
