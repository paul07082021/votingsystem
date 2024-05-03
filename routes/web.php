<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VotersController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\DashboardController;


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

Route::get('login', function () {
    return view('login');
});

Route::get('admin', [AdminController::class, 'index']);
Route::get('partylist', [PartylistController::class, 'index']);
Route::get('voters', [VotersController::class, 'index']);
Route::get('position', [PositionController::class, 'index']);
Route::get('candidates', [CandidatesController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index']);



Route::post('addadmin', [AdminController::class, 'add']);
Route::post('addparty', [PartylistController::class, 'add']);
Route::post('addpos', [PositionController::class, 'add']);