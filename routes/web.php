<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VotersController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\YearController;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('login-voters', function () {
    return view('voterscreen');
});

Route::get('yearlevel', [YearController::class, 'index']);
Route::post('addyear', [YearController::class, 'add']);
Route::post('updateyear', [YearController::class, 'update']);
Route::post('deleteyear', [YearController::class, 'delete']);



Route::get('admin', [AdminController::class, 'index']);
Route::get('partylist', [PartylistController::class, 'index']);
Route::get('voters', [VotersController::class, 'index']);
Route::get('position', [PositionController::class, 'index']);
Route::get('candidates', [CandidatesController::class, 'index']);
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('election', [ElectionController::class, 'index']);
Route::get('electionresult', [VotersController::class, 'result']);
Route::get('login', [LoginController::class, 'index']);

Route::post('loginadmin', [LoginController::class, 'loginadmin']);
Route::get('logoutadmin', [LoginController::class, 'logoutadmin']);

Route::get('voterslogin', [LoginController::class, 'viewloginvoters']);
Route::post('loginvoters', [LoginController::class, 'loginvoters']);




Route::post('addadmin', [AdminController::class, 'add']);
Route::post('updateadmin', [AdminController::class, 'update']);
Route::post('deleteadmin', [AdminController::class, 'delete']);


Route::post('addparty', [PartylistController::class, 'add']);
Route::post('updateparty', [PartylistController::class, 'update']);

Route::post('addpos', [PositionController::class, 'add']);
Route::post('updatepos', [PositionController::class, 'update']);
Route::post('addvoters', [VotersController::class, 'add']);
Route::post('updatevoters', [VotersController::class, 'update']);

Route::post('addcandidates', [CandidatesController::class, 'add']);

Route::post('importvoters', [VotersController::class, 'import']);
Route::get('voterscreen', [VotersController::class, 'voterscreen']);

Route::post('vote', [VotersController::class, 'vote']);
Route::get('votersignout', [LoginController::class, 'logoutvoters']);


Route::post('update', [ElectionController::class, 'update']);

Route::post('votestraight', [VotersController::class, 'votestraight']);


Route::post('deleteparty', [PartylistController::class, 'delete']);
Route::post('deleteposition', [PositionController::class, 'delete']);

Route::post('deletecandidates', [CandidatesController::class, 'delete']);


Route::post('deletevoters', [VotersController::class, 'delete']);

Route::post('updatecandidates', [CandidatesController::class, 'update']);


Route::post('reset', [ElectionController::class, 'reset']);


