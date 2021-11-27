<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizationPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localization_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('street_number');
            $table->string('street');
            $table->string('postal_code');
            $table->string('city');
            $table->boolean('is_normalized');
            $table->boolean('is_start_point')->default(0);
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->json('google_response')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('localization_points');
    }
}
