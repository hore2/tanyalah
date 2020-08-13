<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi', 255);
            $table->integer('profil_id')->index()->unsigned();
            $table->integer('jawaban_id')->index()->unsigned();
            $table->timestamps();
        });
        Schema::table('komentar_jawaban', function (Blueprint $table) {
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
        Schema::dropIfExists('komentar_jawaban');
        Schema::table('komentar_jawaban', function($table) {
            $table->dropForeign(['profil_id'],['jawaban_id']);
         });
    }
}
