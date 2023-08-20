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
        Schema::create('dokumen_senat', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dokumen', 100);
            $table->string('link_url', 100);
            $table->string('dokumen_name', 50)->nullable();
            $table->string('dokumen_path', 100)->nullable();
            $table->string('dokumen_url', 100)->nullable();
            $table->string('keterangan', 200);
            $table->dateTime('tanggal_unggah')->nullable();

            $table->bigInteger('created_user')->index()->nullable();
            $table->bigInteger('modified_user')->index()->nullable();

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
        Schema::dropIfExists('dokumen_senat');
    }
};
