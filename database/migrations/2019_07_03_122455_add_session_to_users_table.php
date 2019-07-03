<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSessionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'session')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('session')->nullable();
            });
        }
        if (!Schema::hasColumn('users', 'picture')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('picture')->nullable();
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
        if (Schema::hasColumn('users', 'session')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('session');
            });
        }
        if (Schema::hasColumn('users', 'picture')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('picture');
            });
        }
    }
}
