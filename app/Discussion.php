<?php

namespace LaravelForum;

use LaravelForum\Reply;
use LaravelForum\Channel;
use LaravelForum\Notifications\ReplyMarkedAsBestReply;

class Discussion extends Model
{
    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    /**
     * @param \LaravelForum\Reply $reply
     */
    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);
        if ($reply->owner->id === $this->author->id){
            return;
        }
        $reply->owner->notify(new ReplyMarkedAsBestReply($this));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function scopeFilterByChannels($builder)
    {
        if (request()->query('channel')) {
            $channel = Channel::where('slug', '=' ,request()->query('channel'))->first();
            if ($channel){
                return $builder->where('channel_id', $channel->id);
            }
            return $builder;
        }
        return $builder;
    }

}
