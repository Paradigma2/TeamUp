<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Ad - klasa za pristup tabeli ad u bazi podataka
 *
 * @version 1.0
 */
class Ad extends Model
{

    protected $table='ad';

    /**
     * Funkcija za dohvatanje povezanog objekta User
     *
     * @param Request $request
     *
     * @return Response
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Funkcija za dohvatanje povezanog objekta Position
     *
     * @param Request $request
     *
     * @return Response
     */
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    /**
     * Funkcija za dohvatanje povezanog objekta Mode
     *
     * @param Request $request
     *
     * @return Response
     */
    public function mode()
    {
        return $this->belongsTo('App\Mode');
    }
   
}

