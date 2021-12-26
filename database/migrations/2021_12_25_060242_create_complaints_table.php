<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->text('address')->nullable();
            $table->json('photos')->nullable();
            $table->integer('post_code')->nullable();
            $table->integer('status')->nullable()->default(0); // 0 pending , 1 verified, 2 under review, 3 rejected

            $table->unsignedBigInteger('user_id')->nullable(); // User
            $table->unsignedBigInteger('city_id')->nullable(); // City id foreign
            $table->unsignedBigInteger('station_id')->nullable(); // Station id foreign

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('station_id')->references('id')->on('users');

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
        Schema::dropIfExists('complaints');
    }
}
