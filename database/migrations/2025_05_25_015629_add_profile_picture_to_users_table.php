<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePictureToUsersTable extends Migration
{
    
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Voeg alleen toe als de kolom nog niet bestaat
            if (! Schema::hasColumn('users', 'profile_picture')) {
                $table->string('profile_picture')->nullable()->after('email');
            }
        });
    }

   
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verwijder alleen als de kolom wél bestaat
            if (Schema::hasColumn('users', 'profile_picture')) {
                $table->dropColumn('profile_picture');
            }
        });
    }
}
