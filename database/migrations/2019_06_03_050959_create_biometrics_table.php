<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiometricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biometrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->binary('left_thumb')->nullable();
            $table->binary('left_index')->nullable();
            $table->binary('left_middle')->nullable();
            $table->binary('left_ring')->nullable();
            $table->binary('left_pinky')->nullable();
            $table->binary('right_thumb')->nullable();
            $table->binary('right_index')->nullable();
            $table->binary('right_middle')->nullable();
            $table->binary('right_ring')->nullable();
            $table->binary('right_pinky')->nullable();
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
        Schema::dropIfExists('biometrics');
    }
}
