<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'produit_id' => 'la-fille-en-rose',
                'section_titre' => 'introduction',
                'section_debut' => 0,
                'section_fin' => 10,
                'section_parent' => NULL,
                'created_at' => '2022-09-30 10:10:00',
                'updated_at' => '2022-09-30 10:10:00',
            ),
            1 => 
            array (
                'id' => 2,
                'produit_id' => 'la-fille-en-rose',
                'section_titre' => 'première partie',
                'section_debut' => 20,
                'section_fin' => 30,
                'section_parent' => 1,
                'created_at' => '2022-09-30 10:10:44',
                'updated_at' => '2022-09-30 10:10:44',
            ),
            2 => 
            array (
                'id' => 3,
                'produit_id' => 'la-fille-en-rose',
                'section_titre' => 'le debut du carnage',
                'section_debut' => 50,
                'section_fin' => 100,
                'section_parent' => 2,
                'created_at' => '2022-09-30 10:20:12',
                'updated_at' => '2022-09-30 10:20:12',
            ),
        ));
        
        
    }
}