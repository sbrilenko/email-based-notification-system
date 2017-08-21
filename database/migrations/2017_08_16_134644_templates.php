<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Templates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191)->unique();
            $table->string('subject')->default('');
            $table->string('template')->default('');
            $table->integer('user_changed')->unsigned()->nullable();
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
        Schema::dropIfExists('templates');
    }
}
