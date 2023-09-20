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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 200);
            $table->string('foto_name')->nullable();
            $table->longText('foto_url')->nullable();
            $table->string('foto_path')->nullable();

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
        Schema::dropIfExists('gallery');
    }
};
