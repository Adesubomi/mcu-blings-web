<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudentSpecificFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'levels')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('level')->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'matric_number')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('matric_number')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'levels')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('level');
            });
        }

        if (Schema::hasColumn('users', 'matric_number')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('matric_number');
            });
        }
    }
}
