<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id('no_surat_masuk');
            $table->date('tgl_surat_masuk');
            $table->text('perihal');
            $table->foreignId('tipe_surat_id');
            $table->enum('sifat_surat', ['Terbuka', 'Rahasia', 'Urgent']);
            $table->boolean('isOpened');
            $table->string('pengirim_surat');
            $table->string('penerima_surat');
            $table->foreignId('creator_id');
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
        Schema::dropIfExists('inbox_mails');
    }
}
