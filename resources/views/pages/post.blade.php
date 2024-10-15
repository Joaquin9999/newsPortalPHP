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
                                    <p><a href="#" class="reply rounded">Responder</a></p>

                                    <!-- Comprobar si el usuario autenticado es el creador del comentario -->
                                    @if (Auth::check() && Auth::id() === $comment->user_id)
                                        <!-- Botón para editar el comentario -->
                                        <button class="edit-comment" data-id="{{ $comment->id }}">Editar</button>

                                        <!-- Botón para borrar el comentario -->
                                        <button class="delete-comment" data-id="{{ $comment->id }}">Borrar</button>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="comment-form-wrap pt-5" style="padding-bottom: 50px;">
                        <h3 class="mb-5">Leave a comment</h3>

                        @if (Auth::check())
                            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="p-5 bg-light">
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

            <!-- END main-content -->
            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </form>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @php
                                $popularPosts = \TCG\Voyager\Models\Post::inRandomOrder()->take(3)->get();
                            @endphp

                            @foreach ($popularPosts as $post)
                                <li>
                                    <a href="{{ route('single', $post->slug) }}">
                                        <img src="{{ Voyager::image($post->image) }}" alt="Image placeholder"
                                            class="me-4 rounded">
                                        <div class="text">
                                            <h4>{{ $post->title }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ $post->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Travel <span>(22)</span></a></li>
                        <li><a href="#">Lifestyle <span>(37)</span></a></li>
                        <li><a href="#">Business <span>(42)</span></a></li>
                        <li><a href="#">Adventure <span>(14)</span></a></li>
                    </ul>
                </div>



                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @php
                            // Obtener las keywords del post actual
                            $keywords = explode(',', $post->meta_keywords);
                            // Crear un array para almacenar los tags
                            $tags = [];

                            // Limpiar y agregar al array de tags
                            foreach ($keywords as $keyword) {
                                $trimmedTag = trim($keyword);
                                if (!empty($trimmedTag)) {
                                    $tags[] = $trimmedTag; // Agregar el tag limpio al array
                                }
                            }

                            // Eliminar duplicados
                            $tags = array_unique($tags);
                        @endphp

                        @foreach ($tags as $tag)
                            <li><a href="#">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <section class="section posts-entry posts-entry-sm bg-light">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
                    </div>
                    <div class="row">
                        @php
                            $morePosts = \TCG\Voyager\Models\Post::inRandomOrder()->take(4)->get();
                        @endphp

                        @foreach ($morePosts as $morePost)
                            <div class="col-md-6 col-lg-3">
                                <div class="blog-entry">
                                    <a href="{{ route('single', $morePost->slug) }}" class="img-link">
                                        <img src="{{ Voyager::image($morePost->image) }}" alt="Image" class="img-fluid">
                                    </a>
                                    <span class="date">{{ $morePost->created_at->format('M. jS, Y') }}</span>
                                    <h2><a href="{{ route('single', $morePost->slug) }}">{{ $morePost->title }}</a>
                                    </h2>
                                    <p>{{ Str::limit(strip_tags($morePost->body), 100) }}</p>
                                    <p><a href="{{ route('single', $morePost->slug) }}" class="read-more">Continue
                                            Reading</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endsection