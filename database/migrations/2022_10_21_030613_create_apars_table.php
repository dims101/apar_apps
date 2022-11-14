<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apars', function (Blueprint $table) {
            $table->id();
            $table->string('id_lokasi')->nullable();
            $table->string('qr_apar');
            $table->string('merk')->nullable();
            $table->string('jenis')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('kode_qr')->nullable();
            $table->string('memo')->nullable();
            $table->date('exp_date')->nullable();
            $table->date('warn_date')->nullable();
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
        Schema::dropIfExists('apars');
    }
}
