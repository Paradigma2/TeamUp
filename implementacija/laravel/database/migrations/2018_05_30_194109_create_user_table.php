<?php

/*Klasa za kreiranje tabele user*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',32);
            $table->string('password',64);
            $table->tinyInteger('online');
            $table->tinyInteger('isAdmin');
            $table->tinyInteger('isMod');
            $table->string('lolNick',16);
            $table->integer('level')->nullable();
            $table->integer('age')->nullable();
            $table->double('grade', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('icon', 100)->nullable();
          
            $table->integer('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('rank')->onDelete('cascade');
            $table->string('remember_token',100)->nullable();
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
        
        Schema::dropIfExists('user');

    }
}
