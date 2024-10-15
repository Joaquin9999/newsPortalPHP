<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id'); // ID del comentario
            $table->unsignedInteger('post_id'); // ID del post relacionado
            $table->unsignedInteger('user_id'); // ID del usuario que hizo el comentario
            $table->text('body'); // Contenido del comentario
            $table->timestamps(); // Campos created_at y updated_at

            // Relación con posts
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // Relación con users (opcional, si quieres saber quién hizo el comentario)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
