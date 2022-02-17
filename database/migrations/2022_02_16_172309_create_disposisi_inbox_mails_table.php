<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiInboxMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_inbox_mails', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_isi');
            $table->string('kepada');
            $table->text('isi_disposisi');
            $table->text('dari');
            $table->foreignId('inbox_mail_id');
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
        Schema::dropIfExists('disposisi_inbox_mails');
    }
}
