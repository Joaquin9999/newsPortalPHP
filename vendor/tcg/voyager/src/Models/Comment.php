<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class Comment extends Model
{
    protected $guarded = []; // No se especifican campos prohibidos

    // Override el método save para asignar el user_id antes de guardar
    public function save(array $options = [])
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Asigna el id del usuario autenticado
            $this->user_id = Auth::id();
        } else {
            // Si el usuario no está autenticado, puedes lanzar una excepción
            throw new \Exception("El usuario debe estar autenticado para crear un comentario.");
        }

        return parent::save($options);
    }

    /**
     * Relación con el modelo de Post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Voyager::modelClass('Post'));
    }

    /**
     * Relación con el modelo de User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'user_id', 'id');
    }

    /**
     * Método para eliminar el comentario.
     *
     * @return bool|null
     */
    public function deleteComment()
    {
        return $this->delete();
    }

    /**
     * Método para actualizar el cuerpo del comentario.
     *
     * @param string $body
     * @return bool
     */
    public function updateComment(string $body)
    {
        $this->body = $body; // Asegúrate de que la columna 'body' existe en la tabla de comentarios
        return $this->save();
    }

}