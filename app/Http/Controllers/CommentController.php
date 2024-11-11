<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Comment;
use TCG\Voyager\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCommentNotification;
use TCG\Voyager\Models\User;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Validar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('single', ['slug' => $slug])
                ->with('error', 'Debes estar autenticado para comentar.');
        }

        // Validación de los campos del comentario
        $request->validate([
            'body' => 'required|string|max:300',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        // Buscar el post por su slug
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return redirect()->route('home')->with('error', 'El post no existe.');
        }

        // Crear el comentario
        $commentData = [
            'post_id' => $post->id,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'is_approved' => false,
        ];

        // Si se está respondiendo a un comentario, asigna el parent_id
        // De lo contrario, parent_id se establece como null
        if ($request->filled('parent_id')) {
            $parentComment = Comment::find($request->parent_id);
            if (!$parentComment) {
                return redirect()->route('single', ['slug' => $slug])
                    ->with('error', 'El comentario al que intentas responder no existe.');
            }
            $commentData['parent_id'] = $request->parent_id;
        }

        $comment = Comment::create($commentData);

        if ($post->author_id !== Auth::id()) {
            $author = $post->authorId;

            if ($author) {
                $author->notify(new NewCommentNotification($comment, $post));
            }
        }

        // Redirigir a la vista del post
        return redirect()->route('single', ['slug' => $slug])
            ->with('success', 'Comentario publicado con éxito.')
            ->header('Location', route('single', ['slug' => $slug]) . '#comment-' . $comment->id);
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('pages.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        // Encontrar el comentario por su ID
        $comment = Comment::findOrFail($id);

        // Actualizar el contenido del comentario
        $comment->body = $request->input('body');
        $comment->save();

        // Verificar que el comentario tiene el campo post_id
        if (isset($comment->post_id)) {
            $post = Post::findOrFail($comment->post_id);

            return redirect()->route('single', $post->slug)
                ->with('success', 'Comentario actualizado correctamente.');
        }
        // Manejo de error
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
    public function pending()
    {
        if (Auth::check() && Auth::user()->role_id != 1) {
            return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');
        }

        // Obtener los comentarios pendientes de aprobación
        $comments = Comment::where('is_approved', false)->paginate(10);
        return view('pages.pending-comments', compact('comments'));
    }

    public function approve($id)
    {
        if (Auth::check() && Auth::user()->role_id != 1) {
            return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');
        }

        // Aprobar el comentario
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true;
        $comment->save();

        return redirect()->route('comments.pending')->with('success', 'Comentario aprobado exitosamente.');
    }

}
