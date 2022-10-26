<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {

        CRUD::setModel(\App\Models\Produits::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/produits');
        CRUD::setEntityNameStrings('un livre', 'Livres');
        /* si il a le role partenaire */
        $user = backpack_user()->hasRole('partenaire');
        if ($user) {
            $id = backpack_user()->id;
            $this->crud->addClause('where', 'owner_id', '=', $id);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addColumn(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom du livre',
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'auteur',
                'type' => 'text',
                'label' => 'auteur',
            ]
        );
        $this->crud->addColumn([
            'name' => 'code_categorie',
            'type' => 'select',
            'label' => "Categorie",
            'entity' => 'categories',
            'attribute' => 'nom',
            'model' => "App\Models\Categories",
        ]);

        // $this->crud->addColumn([
        //     'name' => 'code_souscategorie',
        //     'type' => 'select',
        //     'label' => "sous Categorie",
        //     'entity' => 'souscategories',
        //     'attribute' => 'nom',
        //     'model' => "App\Models\Souscategories",
        // ]);

        $this->crud->addColumn(
            [
                'name' => 'prix_vente',
                'type' => 'number',
                'label' => 'prix de vente'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'activer'
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProduitsRequest::class);
        $this->crud->addField(
            [
                'name' => 'code_categorie',
                'type' => 'select2',
                'label' => "Categorie du produit",
                'entity' => 'categories',
                'attribute' => 'nom',
                'model' => "App\Models\Categories", // foreign key model
                //'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );



        $this->crud->addField(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom du livre',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name' => 'auteur',
                'type' => 'text',
                'label' => 'auteur du livre',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name' => 'owner_id',
                'type' => 'hidden',
                'value' => backpack_user()->id
            ]
        );




        $this->crud->addField(
            [   // Browse
                'label' => "image",
                'name' => "image",
                'type' => 'upload_multiple',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'prix_vente',
                'type' => 'text',
                'label' => 'prix de vente',
                'default' => '2000',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );
        $this->crud->addField(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité disponible',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        /*$this->crud->addField(
            [
                'name' => 'prix_louer1',
                'type' => 'text',
                'label' => 'prix location 15 jour',
                'default' => '3000',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );
        $this->crud->addField(
            [
                'name' => 'prix_louer2',
                'type' => 'text',
                'label' => 'prix location 1 mois',
                'default' => '5000',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );*/
        $this->crud->addField(
            [
                'name' => 'prix_achat',
                'type' => 'text',
                'label' => 'prix d\'achat',
                'default' => '2000',
                'type'=>'hidden',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField([
            'name' => 'description',
            'type' => 'wysiwyg',
            'label' => 'description du produit',
        ]);

        $this->crud->addField(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'Activer',
                'default' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $mtn=request()->input('prix_vente');
        // $prix_achat=intval($mtn)*0.2 + $mtn;
        // $prix_vente=intval($mtn)+1500;
        $prix_achat=$mtn;
        // $prix_vente=$mtn;

        // \DB::table('produits')->where('code',request()->input('code'))->first() ? "" : request()->merge(array('prix_vente'=>$prix_vente));
        request()->merge(array('prix_achat'=>$prix_achat));
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {

        $this->crud->addColumn(
            [
                'name' => 'code',
                'type' => 'text',
                'label' => 'code',
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom du produit',
            ]
        );

        $this->crud->addColumn([
            'name' => 'code_categorie',
            'type' => 'select',
            'label' => "Categorie",
            'entity' => 'categories',
            'attribute' => 'nom',
            'model' => "App\Models\Categories",
        ]);

        $this->crud->addColumn([
            'name' => 'code_souscategorie',
            'type' => 'select',
            'label' => "sous Categorie",
            'entity' => 'souscategories',
            'attribute' => 'nom',
            'model' => "App\Models\Souscategories",
        ]);

        $this->crud->addColumn(
            [   // Browse
                'label' => "image",
                'name' => "image",
                'type' => 'upload_multiple',
                'prefix' => 'storage/',
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'prix_vente',
                'type' => 'number',
                'label' => 'prix de vente',
            ]
        );
        
        $this->crud->addColumn(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité'
            ]
        );
        
        $this->crud->addColumn(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'activer'
            ]
        );
    }


}
