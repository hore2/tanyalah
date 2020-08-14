<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('judul', 45);
            $table->string('isi', 255);
            $table->unsignedBigInteger('jawaban_tepat_id');
            $table->foreign('jawaban_tepat_id')->references('id')->on('jawaban');
            $table->unsignedBigInteger('profil_id');
            $table->foreign('profil_id')->references('id')->on('profil');
        }); */
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->integerIncrements('pertanyaan_id'); 
            $table->string('judul', 100);
            $table->longText('isi');
            $table->integer('profil_id')->index();
            $table->integer('jawaban_tepat_id')->index();
            $table->timestamps();
        });

        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->foreign('profil_id')->references('profil_id')->on('profil')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jawaban_tepat_id')->references('jawaban_id')->on('jawaban')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan');
        Schema::table('pertanyaan', function($table) {
            $table->dropForeign('profil_id');
         });
    }
}
