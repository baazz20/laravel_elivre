<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SouscategoriesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SouscategoriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SouscategoriesCrudController extends CrudController
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
        if (!backpack_user()->hasRole('admin')) {
            $this->crud->denyAccess(['create', 'update', 'delete']);
        }
        CRUD::setModel(\App\Models\Souscategories::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/souscategories');
        CRUD::setEntityNameStrings('sous categorie', 'sous categories');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'label' => "Categorie",
            'type' => 'select2',
            'name' => 'code_cat',// the db column for the foreign key
            // optional
            'entity' => 'categorie', // the method that defines the relationship in your Model
            'model' => "App\Models\Categories", // foreign key model
            'attribute' => 'nom'
        ]);

        $this->crud->addColumn([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addColumn([
            'label' => "image",
            'name' => "image",
            'type' => 'image',
        ]);


        $this->crud->addColumn([
            'name' => 'enabled',
            'type' => 'boolean',
            'label' => "activer"
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SouscategoriesRequest::class);

        $this->crud->addField([
            'label' => "Categorie",
            'type' => 'select2',
            'name' => 'code_cat',// the db column for the foreign key
            // optional
            'entity' => 'categorie', // the method that defines the relationship in your Model
            'model' => "App\Models\Categories", // foreign key model
            'attribute' => 'nom', // foreign key attribute that is shown to user
            'default' => 1 // set the default value of the select2
        ]);


        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'label' => "image",
            'name' => "image",
            'type' => 'image',
            'upload' => true
        ]);

        $this->crud->addField([
            'name' => 'enabled',
            'type' => 'boolean',
            'label' => "activer",
            'default' => 1
        ]);
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
