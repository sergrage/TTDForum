<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function replies()
    {
    	return $this->hasMany('App\Reply');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function addReply($reply)
    {
    	$this->replies()->create($reply);
    }
}
