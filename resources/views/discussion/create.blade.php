@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Discussion</div>
        <div class="card-body">
            <form action="{{Route('discussions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Channel Name</label>
                    <input class="form-control" placeholder="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" cols="5" rows="5" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="channel">Channel</label>
                    <select class="form-control" name="channel" id="channel">
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="btn btn-primary btn-sm">Add</div>
            </form>

        </div>
    </div>
@endsection
