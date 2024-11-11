@php
    use TCG\Voyager\Facades\Voyager;
@endphp

@extends('layouts.main')

@section('content')
<div class="section pending-comments-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Comentarios Pendientes de Aprobación</div>
            </div>
        </div>

        <div class="row posts-entry">
            <div class="col-lg-8">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse($comments as $comment)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <div>
                            <span class="date">{{ $comment->created_at->format('M. jS, Y') }}</span>
                            <h2><a href="#">{{ $comment->user->name }}</a></h2>
                            <p>{{ $comment->body }}</p>
                            <form action="{{ route('comments.approve', $comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">Aprobar</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No hay comentarios pendientes de aprobación.</p>
                @endforelse

                <!-- Paginación-->
                @if($comments->hasPages())
                    <div class="row text-start pt-5 border-top">
                        <div class="col-md-12">
                            <div class="custom-pagination">
                                {{ $comments->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection