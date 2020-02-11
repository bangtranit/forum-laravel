@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')
        <div class="card-body">
            {!! $discussion->title !!}
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>

    <div class="card card-default my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{Route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="reply" id="reply">
                        <trix-editor input="reply">
                        </trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Reply</button>

                </form>
            @else
                <a class="btn btn-info" href="/login">Sign In To Add A Reply</a>
            @endauth
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection