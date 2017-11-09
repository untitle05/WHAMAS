<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceCiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences_cibles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('experiences_id');
            $table->integer('cibles_id');

            $table->foreign('experiences_id')->references('id')->on('experiences')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('cibles_id')->references('id')->on('cibles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiences_cibles', function(Blueprint $table) {
            $table->dropForeign('experiences_cibles_experiences_id_foreign');
            $table->dropForeign('experiences_cibles_cibles_id_foreign');
        });

        Schema::dropIfExists('experiences_cibles');
    }
}
