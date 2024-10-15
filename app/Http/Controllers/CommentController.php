<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Comment; // Asegúrate de que el namespace sea correcto
use TCG\Voyager\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Validar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('single', ['slug' => Post::find($postId)->slug])
                ->with('error', 'Debes estar autenticado para comentar.');
        }

        // Validación de los campos del comentario
        $request->validate([
            'body' => 'required|string|max:300', // Ajusta la longitud máxima según lo necesites
        ]);

        // Crear el comentario
        $comment = Comment::create([
            'post_id' => $postId, // Relaciona el comentario con el post
            'body' => $request->body, // Asigna el cuerpo del comentario
        ]);

        // Redirigir a la vista del post con un mensaje de éxito
        return redirect()->route('single', ['slug' => Post::find($postId)->slug])
            ->with('success', 'Comentario publicado con éxito.');
    }
    public function edit($id, $commentId)
    {
        $comment = Comment::findOrFail($commentId); // Obtiene el comentario
        $post = Post::findOrFail($id); // Obtiene el post relacionado (opcional)

        return view('pages.edit', compact('comment', 'post'));
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Validar el contenido del comentario
        $request->validate([
            'body' => 'required|string|max:300',
        ]);

        // Actualizar el comentario
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('single', ['slug' => $comment->post->slug])
            ->with('success', 'Comentario actualizado con éxito.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado con éxito.');
    }
}