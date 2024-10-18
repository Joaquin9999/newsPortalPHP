@php
    use TCG\Voyager\Facades\Voyager;
@endphp

@extends('layouts.main')

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ Voyager::image($post->image) }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">{{ $post->title }}</h1>
                    <div class="post-meta align-items-center text-center">
                        <span>&nbsp;-&nbsp; {{ $post->created_at->format('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    {!! $post->body !!}
                </div>
                <div class="pt-5 comment-wrap">
                    <h3 class="mb-5 heading">{{ $post->comments()->count() }} Comments</h3>
                    <ul class="comment-list">
                        @foreach ($post->comments as $comment)
                            <li class="comment">
                                <div class="comment-body">
                                    <h3>{{ $comment->user->name }}</h3>
                                    <div class="meta">{{ $comment->created_at->format('F j, Y') }}</div>
                                    <p>{{ $comment->body }}</p>

                                    <!-- Botón de Reply -->
                                    <p><a href="#" class="reply rounded" onclick="toggleReplyForm(event)">Responder</a></p>

                                    <!-- Formulario para responder -->
                                    <div class="reply-form" style="display:none;">
                                        @if (Auth::check())
                                            <form action="{{ route('comments.store', $post->slug) }}" method="POST"
                                                class="p-5 bg-light">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea name="body" id="message" cols="30" rows="3" class="form-control"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Post Reply" class="btn btn-primary">
                                                </div>
                                            </form>
                                        @else
                                            <p class="text-danger">Debes estar <a href="{{ route('login') }}">logueado</a> para
                                                dejar un comentario.</p>
                                        @endif
                                    </div>

                                    <!-- Comprobar si el usuario autenticado es el creador del comentario -->
                                    @if (Auth::check() && Auth::id() === $comment->user_id)
                                        <!-- Botón para editar el comentario -->
                                        <form action="{{ route('pages.edit', $comment->id) }}" method="GET"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="edit-comment">Editar</button>
                                        </form>

                                        <!-- Botón para borrar el comentario -->
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-comment"
                                                onclick="return confirm('¿Estás seguro de que deseas borrar este comentario?');">Borrar</button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Formulario para crear comentario -->
                    <div class="comment-form-wrap pt-5" style="padding-bottom: 50px;">
                        <h3 class="mb-5">Leave a comment</h3>

                        @if (Auth::check())
                            <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>
                            </form>
                        @else
                            <p class="text-danger">Debes estar <a href="{{ route('login') }}">logueado</a> para dejar un
                                comentario.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 sidebar">
                <!-- Sidebar content here -->
            </div>
        </div>
    </div>
</section>

<script>
    function toggleReplyForm(event) {
        event.preventDefault(); // Evitar el comportamiento por defecto del enlace
        const replyForm = event.target.closest('.comment').querySelector('.reply-form');
        replyForm.style.display = replyForm.style.display === 'none' || replyForm.style.display === '' ? 'block' : 'none';
    }
</script>
@endsection