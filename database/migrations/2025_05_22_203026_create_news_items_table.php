<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsItemsTable extends Migration
{
        public function up()
    {
        Schema::create('news_items', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image_path')->nullable();
        $table->text('content');
        $table->timestamp('published_at')->useCurrent();
        $table->timestamps();
    });

    }


    public function down()
    {
        Schema::dropIfExists('news_items');
    }
}
