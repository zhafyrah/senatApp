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
        Schema::create('keanggotaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('pendidikan');
            $table->string('foto_name')->nullable();
            $table->longText('foto_url')->nullable();
            $table->string('foto_path');

            $table->bigInteger('created_user')->index()->nullable();
            $table->foreign('created_user')->references('id')->on('users')->onDelete('SET NULL');

            $table->bigInteger('modified_user')->index()->nullable();
            $table->foreign('modified_user')->references('id')->on('users')->onDelete('SET NULL');

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
        Schema::dropIfExists('keanggotaan');
    }
};
