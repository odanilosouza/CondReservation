<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//return new class extends Migration
class Createalltables extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password');
        });

        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_owner');
        });

        Schema::create('unitspeoples', function (Blueprint $table) {
            $table->id();
            $table->integer('id_init');
            $table->string('name');
            $table->date('birthdate');
        });

        Schema::create('unitvehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('title');
            $table->string('color');
            $table->string('plate');
        });

        Schema::create('unipets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->string('name');
            $table->string('race');

        });

        Schema::create('walls', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('body');
            $table->datetime('datecreated');

        });

        Schema::create('walllikes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_wall');
            $table->integer('id_user');

        });

        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('fileurl');

        });

        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->integer('fileurl');
            $table->integer('id_user');

        });

        Schema::create('warnings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->integer('title');
            $table->integer('status')->ddefault('IN_REVIEW'); //IN_REVIEW, RESOLVED
            $table->date('datecreated');
            $table->text('photos'); //foto1.jpg, foto2.jpg, fot3.lpg

        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->integer('allowed')->default(1);
            $table->string('title');
            $table->string('cover');
            $table->strings('days');
            $table->time('start_time');
            $table->time('end_time');
        });

        Schema::create('areadisableddays', function (Blueprint $table) {
            $table->id();
            $table->integer('id_area');
            $table->date('day');
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unit');
            $table->date('id_area');
            $table->datetime('reservation_date');
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
        Schema::dropIfExists('units');
        Schema::dropIfExists('unitspeoples');
        Schema::dropIfExists('unitvehicles');
        Schema::dropIfExists('walllikes');
        Schema::dropIfExists('docs');
        Schema::dropIfExists('billets');
        Schema::dropIfExists('warnings');
        Schema::dropIfExists('foundandlost');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('areadisableddays');
        Schema::dropIfExists('reservations');

    }
};