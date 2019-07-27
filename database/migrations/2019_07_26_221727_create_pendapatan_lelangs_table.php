<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendapatanLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan_lelangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('peserta_id');
            // $table->unsignedBigInteger('lelang_id');
            $table->unsignedBigInteger('hasil_lelang_id');
            $table->string('pendapatan')->length(100);
            // $table->foreign('peserta_id')->references('id')->on('pesertas')->onDelete('cascade');
            // $table->foreign('lelang_id')->references('id')->on('lelangs')->onDelete('cascade');
            $table->foreign('hasil_lelang_id')->references('id')->on('hasil_lelangs')->onDelete('cascade');
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
        Schema::dropIfExists('pendapatan_lelangs');
    }
}
