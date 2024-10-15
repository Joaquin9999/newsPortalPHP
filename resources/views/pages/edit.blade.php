@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Editar Comentario</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="body">Comentario</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                required>{{ $comment->body }}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Actualizar Comentario" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection