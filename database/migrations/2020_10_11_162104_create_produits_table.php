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
            $table->string('code_categorie');
            $table->string('nom');
            $table->string('lien')->nullable();
            $table->integer('prix_achat')->nullable();
            $table->integer('prix_vente')->nullable();
            // $table->string('status')->default("payant");
            $table->string('type')->nullable();
            $table->string('auteur')->nullable();
            $table->longText('description')->nullable();
            $table->longText('image');
            $table->longText('fichier')->nullable();

            $table->integer('quantite')->nullable();
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
