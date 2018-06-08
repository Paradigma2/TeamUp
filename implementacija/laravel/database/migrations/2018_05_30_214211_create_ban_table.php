<?php
/* Jana Kragovic 0023/2015*/
/* autor: Sanja Perisic, 97/2015 */
/*Klasa za kreiranje tabele ban*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',32);
            $table->string('lolNick',16);
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
        Schema::dropIfExists('ban');
    }
}
