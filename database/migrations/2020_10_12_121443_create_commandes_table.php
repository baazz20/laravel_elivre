<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_adr');
            
            $table->integer('quantite')->default(0);
            $table->string('montant');
            $table->string('prix_livraison')->default(1500);
            $table->integer('status')->default(0);
            $table->integer('annuler')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_client')
                ->references('id')->on('clients')->onDelete('cascade');
           
            $table->foreign('id_adr')
                ->references('id')->on('adresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
