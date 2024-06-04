<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('utilisateur_id');
            $table->string('nom', 100);
            $table->string('email', 100)->unique();
            $table->string('numero_telephone', 15)->unique();
            $table->string('mot_de_passe_hash', 255);
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
