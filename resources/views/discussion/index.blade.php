@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{Route('discussions.create')}}">Add Discussion</a>
    </div>

    <div class="card">
        <div class="card-header">Discussions</div>
        <div class="card-body">
            @foreach($discussions as $discuss)
                <div class="card card-default">
                    <div class="card-header">{{ $discuss->title }}</div>
                    <div class="card-body"> {!! $discuss->content !!}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
