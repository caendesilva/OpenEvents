<?php

use App\Http\Controllers\EventApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PixelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:sanctum')->post('/projects/{project}/events', function (Request $request, string $project) {
    return (new EventApiController)->store($request, $project);
})->name('events.store');

Route::get('/projects/{project}/pixel', function (Request $request, string $project) {
    return (new PixelController)->show($request, $project);
})->name('pixel.show');


Route::post('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::match(['get', 'post'], '/pineprint', function (Request $request) {
    return response()->json([
        'message' => 'Here is your Pineprint',
        'pineprint' => HomeController::pineprint($request, $request->input('modifier')),
    ]);
});