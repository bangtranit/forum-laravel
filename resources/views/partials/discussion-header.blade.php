<div class="card-header">
    <div class="d-flex justify-content-between">
        <img width="40px" height="40px"
             style="border-radius: 20px"
             src="{{ generateAvatarForEmail($discussion->author->email) }}">
        <p class="ml-2 m-2"> {{ $discussion->author->name }}</p>
        <div>
            <a href="{{Route('discussions.show', $discussion->slug)}}" class="btn btn-success btn-sm m-2">View</a>
        </div>
    </div>

</div>