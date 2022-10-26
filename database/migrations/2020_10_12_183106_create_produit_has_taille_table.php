<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitHasTailleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_has_taille', function (Blueprint $table) {
            $table->id();
            $table->string('code_prod');
            $table->string('code_taille');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('code_prod')
                ->references('code')->on('produits')->onDelete('cascade');
            $table->foreign('code_taille')
                ->references('code')->on('tailleproduits')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_has_taille');
    }
}
