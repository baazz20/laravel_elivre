<?php

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produits')->delete();
        
        \DB::table('produits')->insert(array (
            0 => 
            array (
                'code' => 'la-fille-en-rose',
                'code_categorie' => 'ouvrage',
                'nom' => 'la fille en rose',
                'lien' => NULL,
                'prix_achat' => 0,
                'prix_vente' => 0,
                'type' => NULL,
                'auteur' => 'Lisa Terkeust',
                'description' => '<p>une fille tout en rose</p>

<ul>
<li>livre fantastique</li>
<li>interessant</li>
<li>clean</li>
</ul>',
                'image' => '{"1":"articles\\/\\/9ebae6d6e19a8d0419c0465341995498.jpg","2":"storage\\/articles\\/60e43fa43864b89cc3f6acd13db649f5.jpg"}',
                'fichier' => 'fichiers/1095b968bb0acd87866f34e9c5e68ffd.docx',
                'quantite' => NULL,
                'vues' => 0,
                'enabled' => 1,
                'owner_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-09-30 09:21:50',
                'updated_at' => '2022-09-30 09:54:39',
            ),
        ));
        
        
    }
}