<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('phone')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->integer('status')->nullable()->default(0); // 0 unverified , 1 verified, 2 deactivated, 3 banned
            $table->unsignedBigInteger('role_id')->unique()->nullable(); // role id foreign

            // Locations 
            $table->text('address')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(); // City id foreign
            $table->unsignedBigInteger('post_code')->nullable(); // state id 

            // Other users id in case of need 
            $table->unsignedBigInteger('headquarter_id')->nullable(); // Headquarter id foreign
            $table->unsignedBigInteger('station_id')->nullable(); // Station id foreign

            // Foreign keys:
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('headquarter_id')->references('id')->on('users');
            $table->foreign('station_id')->references('id')->on('users');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
