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
                $table->foreignId('register_id')->nullable()->constrained('disposition_registers');
                $table->date('tgl_disposisi');
                $table->foreignId('creator_id')->nullable()->constrained('users');
                $table->foreignId('disposisiTo_id')->nullable()->constrained('users');
                $table->text('comment');
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
