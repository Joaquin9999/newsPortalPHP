@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Comment</h1>

    <form
        action="{{ route('comments.update', ['id' => $post->id, 'slug' => $post->slug, 'commentId' => $comment->id]) }}"
        method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="content">Comment</label>
            <textarea name="content" id="content" class="form-control" rows="5">{{ $comment->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
</div>
@endsection