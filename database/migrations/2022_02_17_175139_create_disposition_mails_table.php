<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposition_mails', function (Blueprint $table) {
                $table->id();
                $table->date('tgl_isi');
                $table->string('kepada');
                $table->text('isi_disposisi');
                $table->text('dari');
                $table->foreignId('inbox_id')->nullable()->constrained('inbox_mails');
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
        Schema::dropIfExists('disposition_mails');
    }
}
