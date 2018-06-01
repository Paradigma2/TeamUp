<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='user';

    public function rank()
    {
        return $this->belongsTo('App\Rank');
    }
}
