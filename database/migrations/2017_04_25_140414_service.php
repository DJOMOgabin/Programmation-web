<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Service extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monaie')->unsigned();
            $table->foreign('monaie')->references('id')->on('monaies');
            $table->string('currency')->default('FCFA');
            $table->string('name');
            $table->integer('category')->unsigned();
            $table->foreign('category')->references('id')->on('categories');
            $table->integer('price')->default('0');
            $table->string('description');
            $table->string('logo');
            $table->boolean('publication');
            $table->rememberToken();
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
        Schema::dropIfExists('services');
    }
}
