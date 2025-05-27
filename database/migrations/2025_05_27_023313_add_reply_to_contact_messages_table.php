<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::table('contact_messages', function (Blueprint $table) {
        $table->string('reply')->nullable();
        $table->string('subject')->after('email'); 
    });
}

public function down()
{
    Schema::table('contact_messages', function (Blueprint $table) {
        $table->dropColumn('reply');
        $table->dropColumn('subject'); 
    });
}

};
