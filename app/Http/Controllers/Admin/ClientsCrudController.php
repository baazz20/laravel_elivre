<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Clients::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/clients');
        CRUD::setEntityNameStrings('client', 'clients');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
        $this->crud->addColumn([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);
        $this->crud->addColumn([
            'name' => 'prenom',
            'type' => 'text',
            'label' => "Prenom"
        ]);
        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
            'label' => "Email"
            
        ]);
        $this->crud->addColumn([
            'name' => 'telephone',
            'type' => 'text',
            'label' => "Contact"
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
        CRUD::setValidation(ClientsRequest::class);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        $this->crud->addField([
            'name' => 'prenom',
            'type' => 'text',
            'label' => "Prenom",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        $this->crud->addField([
            'name' => 'email',
            'type' => 'text',
            'label' => "Email",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ]
            
        ]);
        $this->crud->addField([
            'name' => 'telephone',
            'type' => 'text',
            'label' => "Contact",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        $this->crud->addField([
            'name' => 'enabled',
            'type' => 'boolean',
            'label' => "Activer ?",
           
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
