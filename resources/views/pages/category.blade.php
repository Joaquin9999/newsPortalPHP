@php
    use TCG\Voyager\Facades\Voyager;
@endphp

@extends('layouts.main')

@section('content')

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: {{ $posts->first()->category->name }}</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                @foreach ($posts as $post)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('single', ['slug' => $post->slug]) }}" class="img-link me-4">
                            <img src="{{ Voyager::image($post->image) }}" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <span class="date">{{ $post->created_at->format('M. d, Y') }} &bullet; <a
                                    href="#">{{ $post->category->name }}</a></span>
                            <h2><a href="{{ route('single', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                            <p>{{ Str::limit($post->excerpt, 100) }}</p>
                            <p><a href="{{ route('single', ['slug' => $post->slug]) }}"
                                    class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            <span>1</span>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <span>...</span>
                            <a href="#">15</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4">
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
                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <li><a href="#">Ciberseguridad <span>(12)</span></a></li>
                        <li><a href="#">Web <span>(22)</span></a></li>
                        <li><a href="#">Software <span>(37)</span></a></li>
                        <li><a href="#">I.A <span>(42)</span></a></li>
                    </ul>
                </div>
                <!-- END sidebar-box -->
            </div>
        </div>
    </div>
</div>

@endsection