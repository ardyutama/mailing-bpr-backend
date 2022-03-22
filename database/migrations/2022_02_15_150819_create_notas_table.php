<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_nota');
            $table->string('no_nota')->unique();
            $table->text('perihal');
            $table->foreignId('creator_id')->nullable()->constrained('users');
            $table->foreignId('receiver_id')->nullable()->constrained('users');
            $table->dateTime('openedAt')->nullable();
            $table->foreignId('lastOpened_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('notas');
    }
}
