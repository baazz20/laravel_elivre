<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SouscriptionsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SouscriptionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SouscriptionsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Souscriptions::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/souscriptions');
        CRUD::setEntityNameStrings('souscriptions', 'souscriptions');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::column('id');
        // CRUD::column('produit_id');
        // CRUD::column('souscription_date');
        // CRUD::column('client_nom');
        // CRUD::column('client_prenom');
        // CRUD::column('client_fonction');
        // CRUD::column('client_entite');
        // CRUD::column('client_pays');
        // CRUD::column('client_adresse');
        // CRUD::column('client_telephone');
        // CRUD::column('client_mail');
        // CRUD::column('souscription_datedeb');
        // CRUD::column('souscription_urgence');
        // CRUD::column('souscription_nbpersonnes');
        // CRUD::column('souscription_lieu');
        // CRUD::column('souscription_duree');
        // CRUD::column('souscription_modalite');
        // CRUD::column('souscription_commentaire');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');

        $this->crud->addColumn([
            'name' => 'produit_id',
            'type' => 'select2',
            'label' => "produit",
            // 'entity' => 'produits',
            'attribute' => 'nom',
            'model' => "App\Models\Produits",
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_date',
            'type' => 'text',
            'label' => 'date de souscription'
        ]);

        $this->crud->addColumn([
            'name' => 'client_nom',
            'type' => 'text',
            'label' => 'Nom'
        ]);

        $this->crud->addColumn([
            'name' => 'client_prenom',
            'type' => 'text',
            'label' => 'Prenom'
        ]);

        $this->crud->addColumn([
            'name' => 'client_fonction',
            'type' => 'text',
            'label' => 'fonction'
        ]);

        $this->crud->addColumn([
            'name' => 'client_entite',
            'type' => 'text',
            'label' => 'entite'
        ]);

        $this->crud->addColumn([
            'name' => 'client_adresse',
            'type' => 'text',
            'label' => 'adresse'
        ]);

        $this->crud->addColumn([
            'name' => 'client_telephone',
            'type' => 'text',
            'label' => 'telephone'
        ]);

        $this->crud->addColumn([
            'name' => 'client_mail',
            'type' => 'text',
            'label' => 'mail'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_datedeb',
            'type' => 'text',
            'label' => 'date de debut'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_urgence',
            'type' => 'text',
            'label' => 'urgence'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_nbpersonnes',
            'type' => 'text',
            'label' => 'nombre de personnes'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_lieu',
            'type' => 'text',
            'label' => 'lieu'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_duree',
            'type' => 'text',
            'label' => 'duree'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_modalite',
            'type' => 'text',
            'label' => 'modalite'
        ]);

        $this->crud->addColumn([
            'name' => 'souscription_commentaire',
            'type' => 'text',
            'label' => 'commentaire'
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SouscriptionsRequest::class);

        // CRUD::field('id');
        // CRUD::field('produit_id');
        // CRUD::field('souscription_date');
        // CRUD::field('client_nom');
        // CRUD::field('client_prenom');
        // CRUD::field('client_fonction');
        // CRUD::field('client_entite');
        // CRUD::field('client_pays');
        // CRUD::field('client_adresse');
        // CRUD::field('client_telephone');
        // CRUD::field('client_mail');
        // CRUD::field('souscription_datedeb');
        // CRUD::field('souscription_urgence');
        // CRUD::field('souscription_nbpersonnes');
        // CRUD::field('souscription_lieu');
        // CRUD::field('souscription_duree');
        // CRUD::field('souscription_modalite');
        // CRUD::field('souscription_commentaire');
        // CRUD::field('created_at');
        // CRUD::field('updated_at');

        $this->crud->addField(
            [
                'name' => 'produit_id',
                'type' => 'select2',
                'label' => "produit",
                // 'entity' => 'produits',
                'attribute' => 'nom',
                'model' => "App\Models\Produits", // foreign key model
                //'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );

        $this->crud->addField([
            'name' => 'souscription_date',
            'type' => 'date',
            'label' => 'date de souscription',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        $this->crud->addField([
            'name' => 'client_nom',
            'type' => 'text',
            'label' => 'Nom',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_prenom',
            'type' => 'text',
            'label' => 'Prenom',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_fonction',
            'type' => 'text',
            'label' => 'fonction',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_entite',
            'type' => 'text',
            'label' => 'entite',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_adresse',
            'type' => 'text',
            'label' => 'adresse',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_telephone',
            'type' => 'text',
            'label' => 'telephone',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'client_mail',
            'type' => 'text',
            'label' => 'mail',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_datedeb',
            'type' => 'date',
            'label' => 'date de debut',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_urgence',
            'type' => 'text',
            'label' => 'urgence',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_nbpersonnes',
            'type' => 'number',
            'label' => 'nombre de personnes',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_lieu',
            'type' => 'text',
            'label' => 'lieu',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_duree',
            'type' => 'text',
            'label' => 'duree',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_modalite',
            'type' => 'text',
            'label' => 'modalite',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        $this->crud->addField([
            'name' => 'souscription_commentaire',
            'type' => 'text',
            'label' => 'commentaire',
            'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
}
