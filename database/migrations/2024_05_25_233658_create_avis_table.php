<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTable extends Migration
{
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->id('avis_id');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs', 'utilisateur_id');
            $table->foreignId('chauffeur_id')->constrained('chauffeurs', 'chauffeur_id');
            $table->foreignId('reservation_id')->constrained('reservations', 'reservation_id');
            $table->integer('note')->check('note >= 1 AND note <= 5');
            $table->text('commentaire')->nullable();
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avis');
    }
}
