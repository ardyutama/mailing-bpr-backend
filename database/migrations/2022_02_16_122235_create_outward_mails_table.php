<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutwardMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outward_mails', function (Blueprint $table) {
            $table->id('no_surat_keluar');
            $table->date('tgl_surat_keluar');
            $table->text('perihal');
            $table->foreignId('tipe_surat_id');
            $table->enum('sifat_surat', ['Terbuka', 'Rahasia', 'Urgent']);
            $table->string('pengirim_surat');
            $table->string('penerima_surat');
            $table->string('approver');
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
        Schema::dropIfExists('outward_mails');
    }
}
