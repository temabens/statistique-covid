<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
              $table->string('titre');
              $table->string('content');
           


            $table->unsignedBigInteger('wilaya_id');
            $table->foreign('wilaya_id')
            ->references('id')
            ->on('wilaya')
            ->onDelete('restrict')
            ->onUpdate('restrict');


            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')
            ->references('id')
            ->on('sources')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->unsignedBigInteger('profession_id');
            $table->foreign('profession_id')
            ->references('id')
            ->on('professions')
            ->onDelete('restrict')
            ->onUpdate('restrict');

              
            $table->unsignedBigInteger('malade_id');
            $table->foreign('malade_id')
            ->references('id')
            ->on('malades')
            ->onDelete('restrict')
            ->onUpdate('restrict');
           
              
            $table->string('image');
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
        Schema::dropIfExists('posts');
    }
}


