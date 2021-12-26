<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->nullable()->default(0); // 0 pending , 1 underreview, 2 closed

            $table->unsignedBigInteger('city_id')->nullable(); // City id foreign
            $table->unsignedBigInteger('criminal_id')->nullable();
            $table->unsignedBigInteger('station_id')->nullable();
            $table->unsignedBigInteger('headquarter_id')->nullable();
            $table->unsignedBigInteger('police_id')->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('criminal_id')->references('id')->on('users');
            $table->foreign('station_id')->references('id')->on('users');
            $table->foreign('headquarter_id')->references('id')->on('users');
            $table->foreign('police_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('crimes');
    }
}
