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
        Schema::create('inbox_mails', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_surat_masuk');
            $table->text('perihal');
            $table->foreignId('tipe_surat_id')->nullable()->constrained('type_mails');
            $table->enum('sifat_surat', ['Terbuka', 'Rahasia', 'Urgent']);
            $table->boolean('isOpened');
            $table->foreignId('pengirim_surat')->nullable()->constrained('users');
            $table->foreignId('penerima_surat')->nullable()->constrained('users');
            $table->foreignId('creator_id')->nullable()->constrained('users');
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
