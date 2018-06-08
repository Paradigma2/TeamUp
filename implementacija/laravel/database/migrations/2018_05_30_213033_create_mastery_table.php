<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
/*Klasa za kreiranje tabele mastery*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->bigInteger('points');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->integer('champion_id')->unsigned();
            $table->foreign('champion_id')->references('id')->on('champion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastery');
    }
}
