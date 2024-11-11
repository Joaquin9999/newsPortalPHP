<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Obtener todas las notificaciones del usuario autenticado
        $notifications = auth()->user()->notifications;

        // Puedes devolver una vista o los datos en formato JSON
        return view('notifications.index', compact('notifications'));
    }
    public function show($id)
    {
        // Encuentra la notificación por ID para el usuario autenticado
        $notification = auth()->user()->notifications()->findOrFail($id);

        // Marca la notificación como leída
        $notification->markAsRead();

        // Retorna la vista o redirige a la página relevante
        return view('notificaciones.show', compact('notification'));
    }


    public function markAsRead($notificationId)
    {
        // Encuentra la notificación y marca como leída
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        // Responder con éxito
        return response()->json(['message' => 'Notification marked as read']);
    }
    public function showDashboard()
    {
        // Obtener el número de notificaciones no leídas para el usuario autenticado
        $unreadCount = auth()->user()->unreadNotifications->count();

        // Pasar el valor a la vista
        return view('dashboard', compact('unreadCount'));
    }

}
