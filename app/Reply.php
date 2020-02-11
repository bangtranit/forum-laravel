<?php

namespace LaravelForum;

class Reply extends Model
{
    protected $table = 'replies';
    protected $fillable = [
        'user_id',
        'discussion_id',
        'content'
    ];
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }
}
