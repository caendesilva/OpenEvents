<?php

use App\Docs\DocsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/explore', [ProjectViewController::class, 'index'])
    ->name('explore');

Route::get('/projects/{project}', function (string $project, Request $request) {
    return (new ProjectViewController)->show($project, $request);
})->name('projects.show');

Route::get('/docs/{page?}', function (string $page = null) {
    return (new DocsController)->show($page);
})->name('docs');