<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MarquesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MarquesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MarquesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Marques::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/marques');
        CRUD::setEntityNameStrings('marque', 'marques');
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
            'name' => 'code',
            'type' => 'text',
            'label' => "code"
        ]);

        $this->crud->addColumn([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addColumn([
            'name' => 'logo',
            'type' => 'image',
            'label' => "logo"
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
        CRUD::setValidation(MarquesRequest::class);

        $this->crud->addField([
            'name' => 'code',
            'type' => 'text',
            'label' => "code"
        ]);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'name' => 'logo',
            'type' => 'image',
            'label' => "logo"
        ]);

        $this->crud->addField([
            'name' => 'enabled',
            'type' => 'boolean',
            'label' => "activer"
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
