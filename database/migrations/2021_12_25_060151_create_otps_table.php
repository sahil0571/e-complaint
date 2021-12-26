<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('otp_number')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->unsignedBigInteger('u_id')->nullable();
            $table->foreign('u_id')->references('id')->on('users');
            $table->timestamp('otp_sent')->nullable();
            $table->integer('valid_till')->default(10);
            $table->integer('no_times_attempted')->default(0);
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
        Schema::dropIfExists('otps');
    }
}
