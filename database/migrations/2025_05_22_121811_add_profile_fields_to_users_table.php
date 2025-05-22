<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable();
        $table->date('birthday')->nullable();
        $table->string('profile_photo')->nullable();
        $table->text('about_me')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['username', 'birthday', 'profile_photo', 'about_me']);
    });
}
};