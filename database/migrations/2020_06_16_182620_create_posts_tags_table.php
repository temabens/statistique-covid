<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();


 $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('restrict')
            ->onUpdate('restrict');




                 $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('restrict')
            ->onUpdate('restrict');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
