<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reply extends Model
{
	protected $guarded = [];
	
    public function thread()
    {
    	return $this->belongsTo('App\Thread');
    }

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
