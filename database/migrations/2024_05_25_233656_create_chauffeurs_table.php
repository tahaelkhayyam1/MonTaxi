<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChauffeursTable extends Migration
{
    public function up()
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id('chauffeur_id');
            $table->string('nom', 100);
            $table->string('email', 100)->unique();
            $table->string('numero_telephone', 15)->unique();
            $table->string('numero_permis', 50)->unique();
            $table->foreignId('vehicule_id')->nullable()->constrained('vehicules', 'vehicule_id');
            $table->enum('statut', ['disponible', 'en_course'])->default('disponible');
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chauffeurs');
    }
}
