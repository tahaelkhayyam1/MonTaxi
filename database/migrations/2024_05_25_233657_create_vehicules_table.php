<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id('vehicule_id');
            $table->foreignId('chauffeur_id')->unique()->nullable()->constrained('chauffeurs', 'chauffeur_id');
            $table->string('marque', 50);
            $table->string('modele', 50);
            $table->integer('annee');
            $table->string('plaque_immatriculation', 20)->unique();
            $table->string('couleur', 20);
            $table->enum('statut', ['disponible', 'maintenance'])->default('disponible');
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
