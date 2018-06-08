<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
/*Klasa za kreiranje tabele conversation*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationTable extends Migration
{

    public function up()
    {
        Schema::create('conversation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user1_id')->unsigned();
            $table->foreign('user1_id')->references('id')->on('user')->onDelete('cascade');
            $table->integer('user2_id')->unsigned();
            $table->foreign('user2_id')->references('id')->on('user')->onDelete('cascade');
            $table->unique(['user1_id', 'user2_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversation');
    }
}
