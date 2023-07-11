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
            $table->string('komisi');
            $table->string('ketua_komisi');
            $table->string('nama_anggota1')->nullable();
            $table->string('nama_anggota2')->nullable();
            $table->string('nama_anggota3')->nullable();
            $table->string('fungsi_kerja');

            $table->bigInteger('created_user')->index()->nullable();
          //  $table->foreign('created_user')->references('id')->on('users')->onDelete('SET NULL');

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
        Schema::dropIfExists('fungsi_kerja');
    }
};
