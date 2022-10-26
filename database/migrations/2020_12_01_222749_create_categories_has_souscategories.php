<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesHasSouscategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_has_souscategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_categorie');
            $table->string('code_souscategorie');
            $table->timestamps();

            $table->foreign('code_categorie')
                ->references('code')->on('categories')->onDelete('cascade');

            $table->foreign('code_souscategorie')
                ->references('code')->on('souscategories')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_has_souscategories');
    }
}
