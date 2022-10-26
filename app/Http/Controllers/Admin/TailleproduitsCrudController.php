<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TailleproduitsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TailleproduitsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TailleproduitsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Tailleproduits::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tailleproduits');
        CRUD::setEntityNameStrings('taille', 'taille des produits');
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
            'label' => "nom"
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'type' => 'text',
            'label' => "description"
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
        CRUD::setValidation(TailleproduitsRequest::class);

        $this->crud->addField([
            'name' => 'code',
            'type' => 'text',
            'label' => "code"
        ]);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "nom"
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'text',
            'label' => "description"
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
