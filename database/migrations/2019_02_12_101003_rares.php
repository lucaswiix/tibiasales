<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rares', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('world');
            $table->string('item_name');
            $table->bigInteger('price');
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
        Schema::dropIfExists('rares');
    }
}
