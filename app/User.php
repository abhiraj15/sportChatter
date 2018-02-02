<?php


namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Moloquent;

class User extends Authenticatable
{
   
   
    use Authenticatable;

    public function posts() {
        return $this->hasMany('\App\Post');
    }

    public function comments() {
        return $this->hasMany('\App\Comment');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
