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
        if (!Schema::hasColumn('users', 'level')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('level')->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'gender')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('gender')->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'matric_number')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('matric_number')->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'college')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('college')->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'department')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('department')->nullable();
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

        if (Schema::hasColumn('users', 'gender')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('gender');
            });
        }

        if (Schema::hasColumn('users', 'matric_number')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('matric_number');
            });
        }

        if (Schema::hasColumn('users', 'college')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('college');
            });
        }

        if (Schema::hasColumn('users', 'department')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('department');
            });
        }
    }
}
