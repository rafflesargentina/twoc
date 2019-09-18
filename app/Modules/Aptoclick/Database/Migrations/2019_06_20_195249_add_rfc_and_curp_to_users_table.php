<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRfcAndCurpToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users', function (Blueprint $table) {
                $table->string('rfc')->nullable()->beforeColumn('created_at');
                $table->string('curp')->nullable()->beforeColumn('created_at');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'rfc')) {
            Schema::table(
                'users', function (Blueprint $table) {
                    $table->dropColumn('rfc');
                }
            );
        }

        if (Schema::hasColumn('users', 'curp')) {
            Schema::table(
                'users', function (Blueprint $table) {
                    $table->dropColumn('curp');
                }
            );
        }
    }
}
