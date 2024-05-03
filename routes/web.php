<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VotersController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;


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
Route::get('election', [ElectionController::class, 'index']);
Route::get('electionresult', [ElectionController::class, 'result']);


Route::post('addadmin', [AdminController::class, 'add']);
Route::post('updateadmin', [AdminController::class, 'update']);

Route::post('addparty', [PartylistController::class, 'add']);
Route::post('updateparty', [PartylistController::class, 'update']);

Route::post('addpos', [PositionController::class, 'add']);
Route::post('updatepos', [PositionController::class, 'update']);
Route::post('addvoters', [VotersController::class, 'add']);
Route::post('updatevoters', [VotersController::class, 'update']);

Route::post('addcandidates', [CandidatesController::class, 'add']);

Route::post('importvoters', [VotersController::class, 'import']);
