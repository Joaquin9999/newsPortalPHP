<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class Comment extends Model
{
    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'post_id',
        'body',
        'user_id',
        'parent_id',
    ];

    /**
     * Override el método save para asignar el user_id antes de guardar
     */
    public function save(array $options = [])
    {
        if (Auth::check()) {
            // Asigna el id del usuario autenticado si no está asignado
            $this->user_id = $this->user_id ?? Auth::id();
        } else {
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
     * Relación para obtener el comentario padre.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Relación para obtener los comentarios hijos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(self::class, 'parent_id');
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
        $this->body = $body;
        return $this->save();
    }

}