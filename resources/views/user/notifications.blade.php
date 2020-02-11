@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Notifcations</div>
        <div class="card-body">
            @forelse($notifcations as $notify)
                <ul class="list-group">
                    <li class="list-group-item">
                        @if($notify->type === Config::get('constants.ADD_NEW_REPLY'))
                            A new reply was added to your discussion {{ $notify->data['discussion']['title'] }}
                        @elseif($notify->type === Config::get('constants.MARK_AS_BEST_REPLY'))
                            Your reply ware marked as best reply {{ $notify->data['discussion']['title'] }}
                        @endif
                            <a href="{{ Route('discussions.show', $notify->data['discussion']['slug']) }}"
                               class="float-right btn btn-sm btn-info ">
                                View Reply
                            </a>
                    </li>
                </ul>
            @empty
                There are no any notifycation
            @endforelse
        </div>
    </div>
@endsection
