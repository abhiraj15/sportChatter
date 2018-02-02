<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Comment extends Moloquent
{
    protected $collection = 'comments';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
