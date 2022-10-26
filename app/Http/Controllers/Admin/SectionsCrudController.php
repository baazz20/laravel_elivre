<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SectionsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SectionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SectionsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Sections::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sections');
        CRUD::setEntityNameStrings('sections', 'sections');
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
        // CRUD::column('section_titre');
        // CRUD::column('section_debut');
        // CRUD::column('section_fin');
        // CRUD::column('section_parent');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');

        $this->crud->addColumn([
            'name' => 'produit_id',
            'type' => 'select2',
            'label' => 'produit',
            'entity' => 'produits',
            'attribute' => 'nom',
            'model' => 'App\Models\Produits'
        ]);

        $this->crud->addColumn([
            'name' => 'section_debut',
            'type' => 'text',
            'label' => 'debut'
        ]);

        $this->crud->addColumn([
            'name' => 'section_fin',
            'type' => 'text',
            'label' => 'fin'
        ]);

        $this->crud->addColumn([
            'name' => 'section_titre',
            'type' => 'text',
            'label' => 'titre'
        ]);



        $this->crud->addColumn([
            'name' => 'section_parent',
            'type' => 'select',
            'label' => 'parent',
            'entity' => 'sections',
            'attribute' => 'section_titre',
            'model' => 'App\Models\Sections'
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
        CRUD::setValidation(SectionsRequest::class);

        // CRUD::field('id');
        // CRUD::field('produit_id');
        // CRUD::field('section_titre');
        // CRUD::field('section_debut');
        // CRUD::field('section_fin');
        // CRUD::field('section_parent');
        // CRUD::field('created_at');
        // CRUD::field('updated_at');

        $this->crud->addField([
            'name' => 'produit_id',
            'type' => 'select2',
            'label' => 'produit',
            // 'entity' => 'produits',
            'attribute' => 'nom',
            'model' => 'App\Models\Produits'
        ]);


        $this->crud->addField(
            [
                'name' => 'section_debut',
                'type' => 'number',
                'label' => 'debut',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'section_fin',
                'type' => 'number',
                'label' => 'fin',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'section_titre',
                'type' => 'text',
                'label' => 'titre',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField([
            'name' => 'section_parent',
            'type' => 'select2',
            'label' => 'section parente',
            'entity' => 'children',
            'attribute' => 'section_titre',
            'model' => 'App\Models\Sections',
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
