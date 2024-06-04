<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibiliteChauffeursTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilite_chauffeurs', function (Blueprint $table) {
            $table->id('disponibilite_id');
            $table->foreignId('chauffeur_id')->constrained('chauffeurs', 'chauffeur_id');
            $table->integer('jour_semaine')->check('jour_semaine >= 0 AND jour_semaine <= 6');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilite_chauffeurs');
    }
}
