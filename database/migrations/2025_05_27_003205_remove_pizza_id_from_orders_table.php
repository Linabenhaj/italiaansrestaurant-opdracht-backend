<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // oreign key vallen, als die er is
            if (Schema::hasColumn('orders', 'pizza_id')) {
                $table->dropForeign(['pizza_id']);
                $table->dropColumn('pizza_id');
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('pizza_id')
                  ->after('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }
};
