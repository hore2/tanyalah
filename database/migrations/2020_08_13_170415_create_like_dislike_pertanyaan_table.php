<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('profil_id')->index()->unsigned();
            $table->integer('pertanyaan_id')->index()->unsigned();
            $table->foreign('profil_id')->references('profil_id')->on('profil_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pertanyaan_id')->references('pertanyaan_id')->on('pertanyaan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dislike_pertanyaan');
        Schema::table('like_dislike_pertanyaan', function($table) {
            $table->dropForeign(['profil_id'],['pertanyaan_id']);
         });
    }
}
