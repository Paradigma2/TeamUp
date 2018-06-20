<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Conversation - klasa za pristup tabeli Conversation u bazi podataka
 *
 * @version 1.0
 */
class Conversation extends Model
{
   	protected $table='conversation';

   	/**
     * Funkcija za dohvatanje povezanih objekata klase Message
     *
     * @param Request $request
     *
     * @return Response
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
