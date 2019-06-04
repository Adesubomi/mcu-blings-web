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
            $table->binary('left_thumb');
            $table->binary('left_index');
            $table->binary('left_middle');
            $table->binary('left_ring');
            $table->binary('left_pinky');
            $table->binary('right_thumb');
            $table->binary('right_index');
            $table->binary('right_middle');
            $table->binary('right_ring');
            $table->binary('right_pinky');
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
