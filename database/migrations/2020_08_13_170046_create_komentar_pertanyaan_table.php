<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_pertanyaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isi', 255);
            $table->integer('profil_id')->index();
            $table->integer('pertanyaan_id')->index();
            $table->timestamps();
        });
            Schema::table('komentar_pertanyaan', function (Blueprint $table) {
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
        Schema::dropIfExists('komentar_pertanyaan');
        Schema::table('komentar_pertanyaan', function($table) {
            $table->dropForeign(['profil_id'],['pertanyaan_id']);
         });
    }
}
