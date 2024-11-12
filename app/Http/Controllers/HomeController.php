<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;
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
        return $this->belongsTo(User::class);
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
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        // Solo los editores pueden editar
        if (Auth::user()->role_id !== 3) {
            return redirect()->route('posts.show', $post->id)
                ->with('error', 'No tienes permiso para editar este post.');
        }

        return view('pages.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'body' => 'required|string|max:5000',
        ]);

        $post = Post::findOrFail($id);

        if (Auth::user()->role_id !== 3) {
            return redirect()->route('single', $post->id)
                ->with('error', 'No tienes permiso para editar este post.');
        }

        $post->body = $request->input('body');
        $post->save();

        return redirect()->route('single', $post->slug)
            ->with('success', 'El post ha sido actualizado.');
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
