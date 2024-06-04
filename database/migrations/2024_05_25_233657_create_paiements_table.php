<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id('paiement_id');
            $table->foreignId('reservation_id')->constrained('reservations', 'reservation_id');
            $table->decimal('montant', 10, 2);
            $table->enum('methode_paiement', ['carte', 'espece', 'portefeuille']);
            $table->enum('statut_paiement', ['en_attente', 'termine', 'echoue'])->default('en_attente');
            $table->string('transaction_id', 100)->nullable();
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}
