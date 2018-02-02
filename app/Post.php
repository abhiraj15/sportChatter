<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Post extends Moloquent
{
    protected $collection = 'posts';

    public function user(){
		return $this->belongsTo('\App\User');
    }

    public function comments() {
        return $this->hasMany('\App\Comment');
    }
}

