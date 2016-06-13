<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resto_name');
            $table->string('profile_photo');
            $table->string('resto_photo');
            $table->text('description');
            $table->text('address');
            $table->integer('phone');
            $table->integer('likes');
            $table->integer('share');
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
        Schema::drop('restodatas');
    }
}
