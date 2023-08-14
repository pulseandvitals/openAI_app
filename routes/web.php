<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\GeneratorController;
use Illuminate\Console\GeneratorCommand;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('website')->name('website.')->group(function() {
    Route::get('/', [WebsiteController::class,'index'])->name('index');
    Route::get('/create', [WebsiteController::class,'create'])->name('create');
    Route::post('/store',[WebsiteController::class,'store'])->name('store');
    Route::delete('/{website}',[WebsiteController::class,'destroy'])->name('destroy');
    Route::get('/edit/{website}',[WebsiteController::class,'edit'])->name('edit');
    Route::patch('/update/{website}',[WebsiteController::class,'update'])->name('update');
});

Route::middleware('auth')->prefix('generator')->name('generator.')->group(function() {
    Route::get('/', [GeneratorController::class,'index'])->name('index');
    Route::post('/generate-content',[GeneratorController::class,'generateContent'])->name('generate-content');
});

require __DIR__.'/auth.php';
