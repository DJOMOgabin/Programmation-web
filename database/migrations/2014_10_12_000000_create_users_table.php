<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->string('country');
            $table->string('dateNaiss');
            $table->string('town');
            $table->string('address');
            $table->integer('pobox');
            $table->string('typeOfUser');
            $table->string('firstname');
            $table->string('shortname');
            $table->string('civility');
            $table->string('language');
            $table->string('currency');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('service_providers',function(Blueprint $table){
            $table->integer('user_id')->unsigned()->nullable()->index();
        });
        Schema::table('g_p_s_s', function (Blueprint $table){
            $table->integer('user_id')->unsigned()->nullable()->index();
        });
        Schema::table('themes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->index();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
