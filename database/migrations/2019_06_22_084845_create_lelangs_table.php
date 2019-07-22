<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('kayu_id');
            $table->string('nama')->length(100);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tempat')->length(100);
            $table->string('harga_awal')->length(50);
            $table->tinyInteger('status')->length(2);
            $table->foreign('kayu_id')->references('id')->on('kayus')->onDelete('cascade');
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
        Schema::dropIfExists('lelangs');
    }
}
