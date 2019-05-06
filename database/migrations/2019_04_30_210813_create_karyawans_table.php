<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user');
            $table->string('NIP')->length('25');
            $table->string('nama')->length('255');
            $table->string('tempat_lahir')->length('255');
            $table->date('tanggal_lahir')->length('10');
            $table->string('alamat')->length('255');
            $table->string('telepon')->length('13');
            $table->tinyInteger('status');
            $table->string('gambar')->length('255');
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
        Schema::dropIfExists('karyawans');
    }
}
