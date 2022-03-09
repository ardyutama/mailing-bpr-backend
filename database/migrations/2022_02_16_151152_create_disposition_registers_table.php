<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposition_registers', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_register');
            // $table->integer('no_register');
            $table->foreignId('creator_id')->nullable()->constrained('users');
            $table->foreignId('nota_id')->nullable()->constrained('notas');
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
        Schema::dropIfExists('disposition_registers');
    }
}
