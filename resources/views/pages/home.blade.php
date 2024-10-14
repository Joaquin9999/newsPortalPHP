@extends('layouts.main')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($posts->slice(0, 6) as $post)
                    <div class="col-md-4">
                        <a href="{{ route('single', $post->slug) }}" class="h-entry mb-30 v-height gradient">
                            <div class="featured-img" style="background-image: url('{{ Voyager::image($post->image) }}');">
                            </div>
                            <div class="text">
                                <span class="date">{{ $post->created_at }}</span>
                                <h2>{{ $post->title }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Business</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a href="category.html" class="read-more">View All</a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-8"> <!-- Aumentar espacio para el post -->
                <div class="row g-3">
                    @foreach ($posts->slice(1, 1) as $post) <!-- Solo un post destacado -->
                        <div class="col-md-12"> <!-- Usar col-md-12 para que ocupe toda la columna -->
                            <div class="blog-entry">
                                <a href="{{ route('single', $post->slug) }}" class="img-link">
                                    <img src="{{ Voyager::image($post->image) }}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                </a>
                                <span class="date">{{ $post->created_at->format('M. d, Y') }}</span>
                                <h2><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{{ Str::limit($post->excerpt, 100) }}</p>
                                <p><a href="{{ route('single', $post->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4"> <!-- Reducir el espacio para la lista -->
                <h3 class="posts-entry-title">Recent Posts</h3>
                <ul class="list-unstyled blog-entry-sm">
                    @foreach ($posts->slice(2, 4) as $post) <!-- Mostrar los siguientes posts -->
                        <li>
                            <span class="date">{{ $post->created_at->format('M. d, Y') }}</span>
                            <h3><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p>{{ Str::limit($post->excerpt, 100) }}</p>
                            <p><a href="{{ route('single', $post->slug) }}" class="read-more">Continue Reading</a></p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

    
    <!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            @foreach ($posts->slice(0, 4) as $post) <!-- Muestra solo los primeros 4 posts -->
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('single', $post->slug) }}" class="img-link">
                            <img src="{{ Voyager::image($post->image) }}" alt="Image" class="img-fluid">
                        </a>
                        <span class="date">{{ $post->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h2>
                        <p>{{ Str::limit($post->excerpt, 100) }}</p>
                        <p><a href="{{ route('single', $post->slug) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End posts-entry -->
<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Culture</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9 order-md-2">
                <div class="row g-3">
                    @foreach ($posts->slice(1, 2) as $post) <!-- Mostrar los primeros 3 posts -->
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="{{ route('single', $post->slug) }}" class="img-link">
                                    <img src="{{ Voyager::image($post->image) }}" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">{{ $post->created_at->format('M. d, Y') }}</span>
                                <h2><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{{ Str::limit($post->excerpt, 100) }}</p>
                                <p><a href="{{ route('single', $post->slug) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    @foreach ($posts->slice(0, 3) as $post) <!-- Mostrar los siguientes 2 posts -->
                        <li>
                            <span class="date">{{ $post->created_at->format('M. d, Y') }}</span>
                            <h3><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p>{{ Str::limit($post->excerpt, 100) }}</p>
                            <p><a href="{{ route('single', $post->slug) }}" class="read-more">Continue Reading</a></p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Politics</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row">
            <div class="row">
                @foreach ($posts->slice(0, 9) as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{ route('single', $post->slug) }}" class="img-link">
                                <img src="{{ Voyager::image($post->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="excerpt">
                                <h2><a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 me-3 float-start">
                                        <img src="images/person_1.jpg" alt="Image" class="img-fluid"> <!-- Usa el avatar asociado al author_id -->
                                    </figure>
                                    <span class="d-inline-block mt-1">By <a href="#">{{ $post->author }}</a></span> <!-- Usa el nombre del autor -->
                                    <span>&nbsp;-&nbsp; {{ $post->created_at->format('F j, Y') }}</span>
                                </div>
                                <p>{{ $post->excerpt }}</p>
                                <p><a href="{{ route('single', $post->slug) }}" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

    </div>
</section>

   
@endsection
