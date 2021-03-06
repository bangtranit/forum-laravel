<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\Reply;
use LaravelForum\Discussion;
use Illuminate\Http\Request;
use LaravelForum\Http\Requests\Discussion\CreateDiscussionRequest;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $discussions = Discussion::filterByChannels()->paginate(10);
        return view('discussion.index', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateDiscussionRequest $request)
    {
        $validated = $request->validated();
        auth()->user()->discussion()->create([
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'content' => $request['content'],
            'slug' => str_slug($request['title']),
            'channel_id' => $request['channel']
        ]);
        return $this->curdSucess('success', 'Created discussion successfully', 'discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Discussion $discussion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Discussion $discussion)
    {
        return view('discussion.show', compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Discussion $discussion, Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);
        return $this->curdSucess('success', 'Mark as best reply successfully', '');
    }
}
