<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Voeg alleen toe als 'user_type' nog niet bestaat:
            if (! Schema::hasColumn('users', 'user_type')) {
                $table->string('user_type')
                      ->default('user')
                      ->after('password');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verwijder alleen als 'user_type' bestaat:
            if (Schema::hasColumn('users', 'user_type')) {
                $table->dropColumn('user_type');
            }
        });
    }
}
