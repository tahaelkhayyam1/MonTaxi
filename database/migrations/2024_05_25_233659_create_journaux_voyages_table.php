<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournauxVoyagesTable extends Migration
{
    public function up()
    {
        Schema::create('journaux_voyages', function (Blueprint $table) {
            $table->id('journal_id');
            $table->foreignId('reservation_id')->constrained('reservations', 'reservation_id');
            $table->enum('evenement', ['depart', 'arret', 'pause']);
            $table->timestamp('horodatage');
            $table->foreignId('lieu_id')->constrained('lieux', 'lieu_id');
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('journaux_voyages');
    }
}
