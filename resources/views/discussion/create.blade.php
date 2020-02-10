@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Discussion</div>
        <div class="card-body">
            <form action="{{Route('discussions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" placeholder="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select class="form-control" name="channel" id="channel">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ">Create Discussion</button>
            </form>

        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection