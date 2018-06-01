<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table='ad';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function mode()
    {
        return $this->belongsTo('App\Mode');
    }
}