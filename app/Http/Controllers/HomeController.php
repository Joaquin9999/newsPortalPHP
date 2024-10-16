<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\User;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        return view('pages.home', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.post', ['post' => $post]);
    }

    public function author()
    {
        return $this->belongsTo(User::class); // Suponiendo que el modelo de autor es User
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
