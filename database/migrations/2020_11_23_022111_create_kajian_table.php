<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kategori_id');
            $table->string('judul_kajian');
            $table->text('deskripsi_kajian');
            $table->string('nama_ustadz');
            $table->dateTime('waktu_kajian')->nullable($value = true);
            $table->integer('batas_jumlah_akhwat');
            $table->integer('batas_jumlah_ikhwan');
            $table->string('foto_banner');
            $table->unsignedInteger('masjid_id');

            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kajian');
    }
}
