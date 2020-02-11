@extends('layouts.app')

@section('content')
    @foreach($discussions as $discussion)
        <div class="card">
            @include('partials.discussion-header')
            <div class="card-body">
                <div class="text-center">
                    <span>
                        {!! $discussion->title !!}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
@endsection
