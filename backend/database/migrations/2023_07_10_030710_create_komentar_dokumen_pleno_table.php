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
        Schema::create('komentar_dokumen_pleno', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('dokumen_pleno_id')->index()->nullable();
            $table->bigInteger('user_id')->index()->nullable();
            $table->longText('komentar');
            $table->string('attachment_name', 100)->nullable();
            $table->string('attachment_path', 100)->nullable();
            $table->string('attachment_url', 100)->nullable();

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
        Schema::dropIfExists('komentar_dokumen_pleno');
    }
};
