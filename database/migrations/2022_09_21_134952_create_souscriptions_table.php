<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('produit_id');
            $table->date('souscription_date');
            $table->string('client_nom', 50)->nullable();
            $table->string('client_prenom', 50)->nullable();
            $table->string('client_fonction', 100)->nullable();
            $table->string('client_entite', 100)->nullable();
            $table->string('client_pays', 50)->nullable();
            $table->string('client_adresse', 100)->nullable();
            $table->string('client_telephone', 50)->nullable();
            $table->string('client_mail', 100)->nullable();
            $table->date('souscription_datedeb')->nullable();
            $table->string('souscription_urgence', 50)->nullable();
            $table->integer('souscription_nbpersonnes')->nullable();
            $table->string('souscription_lieu', 100)->nullable();
            $table->string('souscription_duree', 50)->nullable();
            $table->string('souscription_modalite', 50)->nullable();
            $table->string('souscription_commentaire', 300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('souscriptions');
    }
}
