<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
     protected $table='ad';
     public function user(){
     	return $this->belongsTo('App\User');
     }
}
