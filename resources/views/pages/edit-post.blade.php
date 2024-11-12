@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="posts-entry-title">Editar Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="body">Contenido del Post</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                required>{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Actualizar Post" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection