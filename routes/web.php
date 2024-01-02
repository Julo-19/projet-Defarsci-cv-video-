<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\copoController;
use App\Models\User;


use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


// commentaire
Route::get('/copo', [copoController::class, 'index'])->name('copo');



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php





Route::get('/upload', [VideoController::class, 'showUploadForm']);
Route::post('/upload', [VideoController::class, 'uploadVideo'])->name('upload.video');
Route::get('/video/{id}', [VideoController::class, 'showVideo'])->name('video.show');
// Route::get('/list-video',[VideoController::class, 'listVideo'])->name('all-posts.posts');
Route::get('/home', [VideoController::class, 'index'])->name('all-posts.posts');;




require __DIR__.'/auth.php';
