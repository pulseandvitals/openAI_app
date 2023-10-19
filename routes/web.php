<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use Illuminate\Console\GeneratorCommand;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\ContentBriefController;

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

Route::middleware('auth')->prefix('generator')->name('generator.')->group(function () {
    Route::get('/', [GeneratorController::class,'index'])->name('index');
    Route::post('/generate-content',[GeneratorController::class,'generateContent'])->name('generate-content');
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::delete('/destroy/{user}',[UserController::class,'destroy'])->name('destroy');
    Route::get('/create',[UserController::class,'create'])->name('create');
    Route::post('/store',[UserController::class,'store'])->name('store');
    Route::get('/show/{user}',[UserController::class,'show'])->name('show');
    Route::patch('/update/{user}',[UserController::class,'update'])->name('update');
});

Route::middleware('auth')->prefix('document')->name('document.')->group(function () {
    Route::get('/',[DocumentController::class,'index'])->name('index');
    Route::get('/create',[DocumentController::class,'create'])->name('create');
    Route::post('/store',[DocumentController::class,'store'])->name('store');
    Route::delete('/{document}',[DocumentController::class,'destroy'])->name('destroy');
    Route::get('/show/{parent}/{child}/{document}',[DocumentController::class,'show'])->name('show');
    Route::patch('/update/{keyword}',[DocumentController::class,'update'])->name('update');

    Route::prefix('heading')->name('heading.')->group(function () {
        Route::get('/{keyword}', [HeadingController::class,'show'])->name('show');
        Route::post('/extract-json-file/{keyword}',[HeadingController::class,'extractJson'])->name('extract-json-file');
        Route::post('/store/{heading}/{selected}', [HeadingController::class,'store'])->name('store');
    });

    Route::prefix('content-brief')->name('content-brief.')->group(function () {
        Route::get('/create/{heading}',[ContentBriefController::class,'create'])->name('create');
    });

    Route::prefix('article')->name('article.')->group(function () {
        Route::post('/generate-article/{keywords}', [ArticleController::class,'generateArticle'])->name('generate-article');
        Route::delete('/destroy/{prompt}', [ArticleController::class,'destroy'])->name('destroy');
        Route::get('/{keyword}',[ArticleController::class,'show'])->name('show');
        Route::post('/generate-single-article/{article}',[ArticleController::class,'generateSingleArticle'])->name('generate-single-article');
        Route::patch('/submit-article/{article}',[ArticleController::class,'submitArticle'])->name('submit-article');
    });
});
require __DIR__.'/auth.php';
