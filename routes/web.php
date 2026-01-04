<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SpandukController;
use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [AdminController::class, 'authenticate']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/story', [StoryController::class, 'index'])->name('story.index');
Route::get('/story/{article:slug}', [StoryController::class, 'show']);
Route::get('/search', [StoryController::class, 'search'])->name('search');
Route::get('/catalogue', [CatalogueController::class, 'show']);

Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('dashboard.home');
    Route::get('/spanduk', [SpandukController::class, 'index']);
    Route::get('/catalogue', [CatalogueController::class, 'index']);
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/story', [AdminStoryController::class, 'index']);
});

Route::group(['prefix' => 'store','middleware' => ['auth']], function () {
    Route::post('/spanduk', [SpandukController::class, 'store']);
    Route::post('/catalogue', [CatalogueController::class, 'store']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::post('/story', [AdminStoryController::class, 'store']);
});

Route::group(['prefix' => 'update','middleware' => ['auth']], function () {
    Route::patch('/spanduk/{id}', [SpandukController::class, 'update']);
    Route::patch('/catalogue/{id}', [CatalogueController::class, 'update']);
    Route::patch('/customer/{id}', [CustomerController::class, 'update']);
    Route::patch('/story/{id}', [AdminStoryController::class, 'update']);
});

Route::group(['prefix' => 'destroy','middleware' => ['auth']], function () {
    Route::post('/spanduk/{id}', [SpandukController::class, 'destroy']);
    Route::post('/catalogue/{id}', [CatalogueController::class, 'destroy']);
    Route::post('/customer/{id}', [CustomerController::class, 'destroy']);
    Route::post('/story/{id}', [AdminStoryController::class, 'destroy']);
});

Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);

    if (!File::exists($filePath)) {
        abort(404);
    }

    $file = File::get($filePath);
    $type = File::mimeType($filePath);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->where('path', '.*');