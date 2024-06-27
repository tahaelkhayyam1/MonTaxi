<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs', 'utilisateur_id');
            $table->foreignId('chauffeur_id')->nullable()->constrained('chauffeurs', 'chauffeur_id');
            $table->foreignId('vehicule_id')->nullable()->constrained('vehicules', 'vehicule_id');
            $table->string('lieu_depart', 255);
            $table->string('lieu_arrivee', 255);
            $table->timestamp('heure_depart');
            $table->enum('statut', ['en_attente', 'terminee', 'annulee','encours'])->default('en_attente');
            $table->decimal('tarif', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
