<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Comment;
use TCG\Voyager\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $slug) // Cambié $postId a $slug
    {
        // Validar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('single', ['slug' => $slug])
                ->with('error', 'Debes estar autenticado para comentar.');
        }

        // Validación de los campos del comentario
        $request->validate([
            'body' => 'required|string|max:300',
            'parent_id' => 'nullable|exists:comments,id', // Asegúrate de que el parent_id es opcional y existe en la tabla comments
        ]);

        // Buscar el post por su slug
        $post = Post::where('slug', $slug)->firstOrFail(); // Buscar el post utilizando el slug

        // Crear el comentario
        $commentData = [
            'post_id' => $post->id, // Relaciona el comentario con el post encontrado
            'body' => $request->body, // Asigna el cuerpo del comentario
            'user_id' => Auth::id(), // Guarda el ID del usuario autenticado
        ];

        // Si se está respondiendo a un comentario, asigna el parent_id
        // De lo contrario, parent_id se establece como null
        $commentData['parent_id'] = $request->filled('parent_id') ? $request->parent_id : null;

        // Guardar el comentario en la base de datos
        Comment::create($commentData);

        // Redirigir a la vista del post con un mensaje de éxito
        return redirect()->route('single', ['slug' => $slug])
            ->with('success', 'Comentario publicado con éxito.');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('pages.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        // Validar el contenido del comentario
        $request->validate([
            'body' => 'required|string|max:255', // Ajusta según tus necesidades
        ]);

        // Encontrar el comentario por su ID
        $comment = Comment::findOrFail($id);

        // Actualizar el contenido del comentario
        $comment->body = $request->input('body');
        $comment->save();

        // Verificar que el comentario tiene el campo post_id
        if (isset($comment->post_id)) {
            // Encontrar el post asociado al comentario
            $post = Post::findOrFail($comment->post_id); // Asegúrate de que el comentario tenga el campo post_id

            // Redirigir al slug del post correspondiente
            return redirect()->route('single', $post->slug)
                ->with('success', 'Comentario actualizado correctamente.');
        }

        // Manejo de error en caso de que el post no se encuentre
        return redirect()->back()->withErrors('El post asociado no se encontró.');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if ($comment) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comentario borrado exitosamente.');
        }

        return redirect()->back()->with('error', 'Comentario no encontrado.');
    }
}
