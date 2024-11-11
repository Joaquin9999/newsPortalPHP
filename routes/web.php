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
use App\Http\Controllers\NotificationController;

//Visualización página
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', function () {
    return redirect()->route('voyager.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas navbar
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/search-result', [SearchController::class, 'index'])->name('search-result');

//Ruta perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Dashboard
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Posts
Route::get('/posts/{slug}', [HomeController::class, 'post'])->name('single');
Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');


Route::get('/images/{filename}', [HomeController::class, 'showImage'])->name('image.show');

//Comentarios
Route::post('/posts/{slug}/comments', [CommentController::class, 'store'])->name('comments.store'); // Crear un nuevo comentario
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('pages.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::middleware('auth')->group(function () {
    Route::get('/comments/pending', [CommentController::class, 'pending'])->name('comments.pending');
    Route::post('/comments/approve/{id}', [CommentController::class, 'approve'])->name('comments.approve');
});
Route::post('/comments/approve/{id}', [CommentController::class, 'approve'])->name('comments.approve');

//Buscador
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{category_id}', [CategoryController::class, 'index'])->name('category');

//Notificaciones
Route::get('/notificaciones/{notification}', [NotificationController::class, 'show'])->name('notificaciones.show');



