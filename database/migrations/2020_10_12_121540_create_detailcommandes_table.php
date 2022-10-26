<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailcommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailcommandes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('id_commande');
            $table->string('code_prod');
            // $table->string('code_couleur');
            // $table->string('code_taille');
            $table->integer('quantite')->default(0);
            $table->integer('prix_vente')->default(0);
            $table->integer('prix_achat')->default(0);
            $table->string('type_paye')->default("achat");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_commande')
            ->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('code_prod')
                ->references('code')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('code_couleur')
            //     ->references('code')->on('couleurs')->onDelete('cascade');
            // $table->foreign('code_taille')
            //     ->references('code')->on('tailleproduits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailcommandes');
    }
}
