<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Characters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->integer('user_id')->unsigned();           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('permission')->default(false);
            $table->boolean('active')->default(true);
            $table->dateTime('active_days');
            $table->boolean('delete')->default(false);
            $table->boolean('sold')->default(false);
            $table->dateTime('last_request')->nullable();

            $table->string('world');
            $table->string('name');
            $table->integer('level');
            $table->string('vocation');
            $table->string('world_type');
            $table->string('transfer');
            $table->string('sex')->nullable();

            $table->integer('magiclevel');

            $table->binary('image')->nullable();

            $table->boolean('mage_hat')->default(false);
            $table->boolean('elementalist_addon_2')->default(false);
            $table->boolean('neon_sparkid_mount')->default(false);

            $table->boolean('hide_name')->default(true);
            $table->boolean('hide_world')->default(false);

            $table->integer('price');

            $table->integer('axe_fight')->default(10)->nullable();
            $table->integer('sword_fight')->default(10)->nullable();
            $table->integer('club_fight')->default(10)->nullable();
            $table->integer('distance_fight')->default(10)->nullable();
            $table->integer('shielding')->default(10)->nullable();

            $table->longText('description')->nullable();

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
        Schema::dropIfExists('characters');
    }
}
