<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('id_apar');
            $table->string('tuas')->nullable();
            $table->string('segel_tuas')->nullable();
            $table->string('pin')->nullable();
            $table->string('selang')->nullable();
            $table->string('nozzle')->nullable();
            $table->string('pressure')->nullable();
            $table->string('tabung')->nullable();
            $table->string('barcode')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
