<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Message - klasa za pristup tabeli Message u bazi podataka
 *
 * @version 1.0
 */
class Message extends Model
{
    protected $table='message';

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
     * Funkcija za dohvatanje povezanog objekta Conversation
     *
     * @param Request $request
     *
     * @return Response
     */
    public function conversation()
    {
        return $this->belongsTo('App\Conversation');
    }
}
