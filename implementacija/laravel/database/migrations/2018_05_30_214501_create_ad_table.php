<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
/*Klasa za kreiranje tabele ad*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade');
            $table->integer('mode_id')->unsigned();
            $table->foreign('mode_id')->references('id')->on('mode')->onDelete('cascade');
            $table->integer('mastery1_id')->unsigned();
            $table->foreign('mastery1_id')->references('id')->on('mastery')->onDelete('cascade');
            $table->integer('mastery2_id')->unsigned()->nullable();
            $table->foreign('mastery2_id')->references('id')->on('mastery')->onDelete('cascade')->nullable();
            $table->integer('mastery3_id')->unsigned()->nullable();
            $table->foreign('mastery3_id')->references('id')->on('mastery')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('ad');
    }
}
