<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->increments('jawaban_id');
            $table->longText('isi');
            $table->timestamps();
            $table->integer('profil_id',10)->index();
            $table->integer('pertanyaan_id',10)->index();
            //$table->integer('pertanyaan_id')->index();
        });
        Schema::table('jawaban', function (Blueprint $table) {
            $table->foreign('profil_id')->references('profil_id')->on('profil')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jawaban');
        Schema::table('jawaban', function($table) {
            $table->dropForeign(['profil_id'],['pertanyaan_id']);
         });
    }
}
