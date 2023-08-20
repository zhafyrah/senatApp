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
        Schema::create('fungsi_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('komisi', 50);
            $table->string('nama_komisi', 100);
            $table->string('ketua_komisi', 200);
            // $table->string('nama_anggota1', 200)->nullable();
            // $table->string('nama_anggota2', 200)->nullable();
            // $table->string('nama_anggota3', 200)->nullable();
            // $table->string('nama_anggota4', 200)->nullable();
            // $table->string('nama_anggota5', 200)->nullable();
            $table->text('fungsi_kerja');

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
        Schema::dropIfExists('fungsi_kerja');
    }
};
