<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function show($id)
    {
        // Encuentra la notificación por ID para el usuario autenticado
        $notification = auth()->user()->notifications()->findOrFail($id);

        // Marca la notificación como leída
        $notification->markAsRead();

        $postId = $notification->data['post_slug'];
        $commentId = $notification->data['comment_id'];

        return redirect()->route('posts.show', ['id' => $postId]) . "#comment-" . $commentId;
    }

}
