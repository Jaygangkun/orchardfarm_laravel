<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\API\LivestockSourceController;
use App\Http\Controllers\API\LivestockController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\FinancialController;
use App\Http\Controllers\API\FarmController;
use App\Http\Controllers\API\AnimalStatusController;
use App\Http\Controllers\API\PenController;
use App\Http\Controllers\API\AnimalTypeController;
use App\Http\Controllers\API\BreedController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\MedicineTypeController;
use App\Http\Controllers\API\InsuranceController;

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

// Route::apiResource('animal_status', AnimalStatusController::class)->middleware(['auth0.authenticate']);
// Route::apiResource('animal_status', AnimalStatusController::class);
Route::get('public', function () {
    return response()->json([
        'message' => 'Hello from a public endpoint! You don\'t need to be authenticated to see this.',
        'authorized' => Auth::check(),
        'user' => Auth::check() ? json_decode(json_encode((array) Auth::user(), JSON_THROW_ON_ERROR), true) : null,
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth0.authorize.optional']);

Route::get('private', function () {
    return response()->json([
        'message' => 'Hello from a private endpoint! You need to be authenticated to see this.',
        'authorized' => Auth::check(),
        'user' => Auth::check() ? json_decode(json_encode((array) Auth::user(), JSON_THROW_ON_ERROR), true) : null,
    ], 200, [], JSON_PRETTY_PRINT);
})->middleware(['auth0.authorize']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/forgot_password', [UserController::class, 'forgot_password']);

Route::group(['prefix' => 'livestock_source', 'middleware' => ['auth0.authorize']], function() {
    Route::post('/add', [LivestockSourceController::class, 'add']);
});

Route::group(['prefix' => 'livestock', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [LivestockController::class, 'all']);
    Route::post('/add', [LivestockController::class, 'add']);
    Route::get('/offspring/all', [LivestockController::class, 'offspring_all']);
});

Route::group(['prefix' => 'event', 'middleware' => ['auth0.authorize']], function() {
    Route::post('/group/add', [EventController::class, 'group_add']);
    Route::post('/individual/add', [EventController::class, 'individual_add']);
    Route::post('/type/add', [EventController::class, 'type_add']);
});

Route::group(['prefix' => 'financial', 'middleware' => ['auth0.authorize']], function() {
    Route::post('/category/add', [FinancialController::class, 'category_add']);
    Route::post('/transaction/add', [FinancialController::class, 'transaction_add']);
});

Route::group(['prefix' => 'user', 'middleware' => ['auth0.authorize']], function() {
    Route::post('/add', [UserController::class, 'add']);
    Route::get('/all', [UserController::class, 'all']);
    Route::post('/role/add', [UserController::class, 'role_add']);
});

Route::group(['prefix' => 'farm', 'middleware' => ['auth0.authorize']], function() {
    Route::post('/profile', [FarmController::class, 'add']);
});

Route::group(['prefix' => 'pen', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [PenController::class, 'all']);
    Route::post('/add', [PenController::class, 'add']);
});

Route::group(['prefix' => 'animal_status', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [AnimalStatusController::class, 'all']);
    Route::post('/add', [AnimalStatusController::class, 'add']);
});

Route::group(['prefix' => 'animal_type', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [AnimalTypeController::class, 'all']);
    Route::post('/add', [AnimalTypeController::class, 'add']);
});

Route::group(['prefix' => 'breed', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [BreedController::class, 'all']);
    Route::post('/add', [BreedController::class, 'add']);
});

Route::group(['prefix' => 'medicine', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [MedicineController::class, 'all']);
    Route::post('/add', [MedicineController::class, 'add']);
});

Route::group(['prefix' => 'medicine_type', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [MedicineTypeController::class, 'all']);
    Route::post('/add', [MedicineTypeController::class, 'add']);
});

Route::group(['prefix' => 'insurance', 'middleware' => ['auth0.authorize']], function() {
    Route::get('/all', [InsuranceController::class, 'all']);
    Route::post('/add', [InsuranceController::class, 'add']);
});