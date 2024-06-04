<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notification_id');
            $table->foreignId('utilisateur_id')->nullable()->constrained('utilisateurs', 'utilisateur_id');
            $table->foreignId('chauffeur_id')->nullable()->constrained('chauffeurs', 'chauffeur_id');
            $table->text('message');
            $table->enum('statut', ['envoye', 'lu'])->default('envoye');
            $table->timestamp('cree_a')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
