<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif', function (Blueprint $table) {
          $table->id();
          $table->integer('id_pelayaran');
          $table->integer('id_city');
          $table->BigInteger('price');
          $table->dateTime('date');
          $table->string('pic_pelayaran',100);
          $table->BigInteger('last_price1');
          $table->BigInteger('last_price2');
          $table->BigInteger('last_price3');
          $table->timestamps();
          $table->DateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif');
    }
}
