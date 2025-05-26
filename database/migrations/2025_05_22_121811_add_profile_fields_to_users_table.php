<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Voeg alleen toe als kolom nog niet bestaat
            if (! Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('name');
            }
            if (! Schema::hasColumn('users', 'birthday')) {
                $table->date('birthday')->nullable()->after('password');
            }
            if (! Schema::hasColumn('users', 'profile_picture')) {
                $table->string('profile_picture')->nullable()->after('email');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verwijder alleen als kolom bestaat
            if (Schema::hasColumn('users', 'profile_picture')) {
                $table->dropColumn('profile_picture');
            }
            if (Schema::hasColumn('users', 'birthday')) {
                $table->dropColumn('birthday');
            }
            if (Schema::hasColumn('users', 'username')) {
                $table->dropColumn('username');
            }
        });
    }
}
