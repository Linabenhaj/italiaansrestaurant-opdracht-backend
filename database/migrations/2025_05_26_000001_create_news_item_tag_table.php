<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsItemTagTable extends Migration
{
    public function up()
    {
        Schema::create('news_item_tag', function(Blueprint $table){
            $table->foreignId('news_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->primary(['news_item_id','tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_item_tag');
    }
}
