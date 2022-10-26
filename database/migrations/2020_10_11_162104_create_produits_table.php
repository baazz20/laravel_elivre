<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('nom');
            $table->string('auteur')->nullable();
            $table->longText('image');
            $table->integer('prix_achat');
            $table->integer('prix_vente');
            $table->integer('prix_louer1')->nullable();
            $table->integer('prix_louer2')->nullable();
            $table->integer('quantite');
            $table->longText('description')->nullable();
            $table->string('code_categorie');
            // $table->string('code_souscategorie');
            // $table->string('code_marq');
            $table->integer('vues')->default(0);
            $table->boolean('enabled');
            $table->integer('owner_id')->comment('celui qui à ajouter le produit dans la bd')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('produits');
    }
}
