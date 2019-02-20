<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('value');
            $table->bigInteger('price_each');
            $table->boolean('sold')->default(false);
            
            $table->boolean('active')->default(true);

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
       Schema::dropIfExists('coins');
    }
}
