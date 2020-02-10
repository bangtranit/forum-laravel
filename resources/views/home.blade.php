@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{Route('discussions.create')}}">Add Discussion</a>
    </div>

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        Dashboard
    </div>
</div>
@endsection
