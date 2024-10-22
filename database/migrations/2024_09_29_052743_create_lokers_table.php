<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokersTable extends Migration
{
    public function up()
    {
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->string('bid');
            $table->string('nampe');
            $table->json('kual');  // Menggunakan tipe data JSON untuk kual
            $table->json('job');   // Menggunakan tipe data JSON untuk job
            $table->date('dl');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lokers');
    }
}
