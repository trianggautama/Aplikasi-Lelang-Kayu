<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_lelangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('peserta_id');
            $table->unsignedBigInteger('lelang_id');
            $table->string('bid_harga')->length(100);
            $table->tinyInteger('status_bid')->default(1);
            $table->foreign('lelang_id')->references('id')->on('lelangs')->onDelete('cascade');
            $table->foreign('peserta_id')->references('id')->on('pesertas')->onDelete('cascade');
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
        Schema::dropIfExists('hasil_lelangs');
    }
}
