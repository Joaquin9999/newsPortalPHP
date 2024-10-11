<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las categorías
        $categories = Category::with('posts')->where('slug', '<>', '')->get();

        // Obtener todos los posts
        $posts = Post::all(); // o puedes usar otras condiciones como ->latest() para obtener los más recientes

        return view('pages.home', compact('categories', 'posts')); // Asegúrate de pasar $posts aquí
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Obtener el post con el slug proporcionado
        $post = Post::where('slug', $slug)->firstOrFail();

        // Retornar la vista con el post específico
        return view('pages.blog-post', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // mostrar  imagen desde el storage
    public function showImage($filename)
    {
        // Ruta completa de la imagen
        $path = storage_path('app/public/posts/' . $filename);

        // Verifica si el archivo existe
        if (!file_exists($path)) {
            abort(404);
        }

        // Devuelve la imagen
        return response()->file($path);
    }
}
