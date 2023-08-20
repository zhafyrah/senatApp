<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_komisi', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat', 200);
            $table->string('dokumen_name', 50)->nullable();
            $table->string('dokumen_path', 100)->nullable();
            $table->string('dokumen_url', 100)->nullable();
            $table->string('keterangan', 200);
            $table->dateTime('tanggal_unggah')->nullable();

            $table->bigInteger('created_user')->index()->nullable();
            //$table->foreign('created_user')->references('id')->on('users')->onDelete('SET NULL');

            $table->bigInteger('modified_user')->index()->nullable();
            // $table->foreign('modified_user')->references('id')->on('users')->onDelete('SET NULL');

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
        Schema::dropIfExists('dokumen_komisi');
    }
};
