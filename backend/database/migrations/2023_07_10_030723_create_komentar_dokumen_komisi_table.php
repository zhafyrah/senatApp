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
        Schema::create('komentar_dokumen_komisi', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('dokumen_komisi_id')->index()->nullable();
            /*  $table->foreignId('dokumen_komisi_id')->constrained(
                table: 'dokumen_senat',
            )
            ->onUpdate('cascade')
            ->onDelete('cascade'); */

            $table->bigInteger('user_id')->index()->nullable();
            /* $table->foreignId('user_id')->constrained(
                table: 'users',
            )
            ->onUpdate('cascade')
            ->onDelete('cascade'); */

            $table->longText('komentar');
            $table->string('attachment_name')->nullable();
            $table->string('attachment_path')->nullable();
            $table->string('attachment_url')->nullable();


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
        Schema::dropIfExists('komentar_dokumen_komisi');
    }
};
