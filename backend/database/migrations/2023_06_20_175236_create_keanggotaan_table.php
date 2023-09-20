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
            $table->string('nama', 200);
            $table->string('jabatan', 100);
            $table->string('pendidikan', 100);
            $table->string('periode', 50);
            $table->string('foto_name')->nullable();
            $table->longText('foto_url')->nullable();
            $table->string('foto_path');

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
        Schema::dropIfExists('keanggotaan');
    }
};
