<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieuxTable extends Migration
{
    public function up()
    {
        Schema::create('lieux', function (Blueprint $table) {
            $table->id('lieu_id');
            $table->string('adresse', 255);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lieux');
    }
}
