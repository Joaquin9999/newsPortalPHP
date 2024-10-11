<?php

use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/dashboard', function () {
    return redirect()->route('voyager.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Ruta para pag About
Route::get('/about', [AboutController::class, 'index'])->name('about');

//Ruta para pag Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Ruta para pag Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

//Ruta para pag Category
Route::get('/category', [CategoryController::class, 'index'])->name('category');

//Ruta para pag Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

//Ruta para pag Contact
Route::get('/search-result', [SearchController::class, 'index'])->name('search-result');

//Ruta para pag Single
Route::get('/single', [SingleController::class, 'index'])->name('single');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//url de cada 
Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');

//url de imagenes en bd
Route::get('/images/{filename}', [HomeController::class, 'showImage'])->name('image.show');

