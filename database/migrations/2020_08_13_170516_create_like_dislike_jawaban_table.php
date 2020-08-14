<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikeJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('profil_id')->index()->unsigned();
            $table->integer('jawaban_id')->index()->unsigned();
            $table->foreign('profil_id')->references('profil_id')->on('profil_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jawaban_id')->references('jawaban_id')->on('jawaban')->onUpdate('cascade')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dislike_jawaban');
        Schema::table('like_dislike_jawaban', function($table) {
            $table->dropForeign(['profil_id'],['jawaban_id']);
         });
    }
}
