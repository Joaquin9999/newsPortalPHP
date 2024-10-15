<?php

use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
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
Route::get('/single/{slug}', [SingleController::class, 'index'])->name('single');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts/{slug}', [HomeController::class, 'post'])->name('single');

Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');


Route::get('/images/{filename}', [HomeController::class, 'showImage'])->name('image.show');

// Rutas para comentarios
Route::post('/posts/{slug}/comments', [CommentController::class, 'store'])->name('comments.store'); // Crear un nuevo comentario

// Ruta para editar un comentario
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('pages.edit');

// Ruta para actualizar un comentario
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

// Ruta para borrar un comentario
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::resource('comments', CommentController::class);


