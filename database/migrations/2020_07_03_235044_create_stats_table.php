<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();


             $table->unsignedBigInteger('wilaya_id');
            $table->foreign('wilaya_id')
            ->references('id')
            ->on('wilaya')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->integer('cas_tot');
            $table->integer('deces_tot');
            $table->integer('gueris_tot');
            $table->integer('en_cours_soin');
            $table->integer('gueris_24h');
            $table->integer('deces_24h');
            $table->date('date');

            
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
        Schema::dropIfExists('stats');
    }
}
