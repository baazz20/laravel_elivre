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
                'prix_achat' => 15000,
                'prix_vente' => 15000,
                'type' => NULL,
                'auteur' => 'Lisa Terkeust',
                'description' => '<p>une fille tout en rose</p>

<ol>
<li>livre fantastique</li>
<li>interessant</li>
<li>clean</li>
</ol>',
                'image' => '{"1":"articles\\/\\/9ebae6d6e19a8d0419c0465341995498.jpg","2":"storage\\/articles\\/60e43fa43864b89cc3f6acd13db649f5.jpg"}',
                'fichier' => 'fichiers/1095b968bb0acd87866f34e9c5e68ffd.docx',
                'quantite' => 5,
                'vues' => 0,
                'enabled' => 1,
                'owner_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-09-30 09:21:50',
                'updated_at' => '2022-10-26 16:59:21',
            ),
            1 => 
            array (
                'code' => 'une-vie-motivee-par-lessentiel',
                'code_categorie' => 'ouvrage',
                'nom' => 'Une Vie Motivée Par L\'essentiel',
                'lien' => NULL,
                'prix_achat' => 15000,
                'prix_vente' => 15000,
                'type' => NULL,
                'auteur' => 'Rick Warren',
            'description' => '<p>&laquo;Ce n&#39;est pas en nous centrant sur nous-m&ecirc;mes que nous d&eacute;couvrirons le v&eacute;ritable sens de notre existence&raquo;, affirme l&#39;auteur. O&ugrave; le trouver, alors ? Rick Warren nous propose un parcours en 42 chapitres (l&#39;id&eacute;al &eacute;tant d&#39;en lire un par jour) qui nous am&egrave;ne &agrave; d&eacute;couvrir les r&eacute;ponses apport&eacute;es par un livre mill&eacute;naire dont l&#39;autorit&eacute; est, aujourd&#39;hui encore, reconnue par beaucoup : la Bible. Que vous soyez croyant ou non, il vaut la peine de mettre un temps &agrave; part pour entrer en dialogue avec lui.</p>',
                'image' => '["articles\\/ed82887dda89a55ff6ef1fc09e766282.png"]',
                'fichier' => 'fichiers/ae490449e28e5538f1c9aa98770b4586.pdf',
                'quantite' => 5,
                'vues' => 0,
                'enabled' => 1,
                'owner_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-10-26 17:03:32',
                'updated_at' => '2022-10-26 17:03:32',
            ),
        ));
        
        
    }
}