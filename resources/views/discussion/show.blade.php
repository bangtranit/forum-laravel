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

    @foreach($discussion->replies()->paginate(2) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="30px" height="30px" style="border-radius: 20px"
                             src="{{ generateAvatarForEmail($reply->owner->email) }}">
                        <span> {{$reply->owner->name}}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach

    {{ $discussion->replies()->paginate(2)->links() }}

    <div class="card card-default my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{Route('replies.store', $discussion->slug)}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="content" id="content">
                        <trix-editor input="content">
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