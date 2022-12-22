<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SettingController;
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
    return view('front.about');
});













// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BlogController::class, 'dashboard']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category-del/{id}', [CategoryController::class, 'destroy']);
    Route::post('/category-edit', [CategoryController::class, 'update']);

    Route::resource('blogs', BlogController::class);
    Route::get('blogs/{id}', [BlogController::class, 'show']);
    Route::get('blog-edit/{id}', [BlogController::class, 'showeditpage']);
    Route::get('blog-del/{id}', [BlogController::class, 'destroy']);

    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/contact-del/{id}', [ContactController::class, 'destroy']);
    Route::post('/contact-edit', [ContactController::class, 'update']);

    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings', [SettingController::class, 'update']);
});


Route::get('/', [FrontController::class, 'home']);
Route::get('/post/{id}/{cat_id}', [FrontController::class, 'post']);
Route::get('/about', [FrontController::class, 'about']);
Route::get('/contacts', [FrontController::class, 'contact']);
Route::post('/contact-store', [ContactController::class, 'store']);


require __DIR__.'/auth.php';


