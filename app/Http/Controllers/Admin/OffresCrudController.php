<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OffresRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OffresCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OffresCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Offres::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/offres');
        CRUD::setEntityNameStrings('offres', 'offres');
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
            'label' => "livre",
            'type' => 'select',
            'name' => 'code_produit',// the db column for the foreign key
            // optional
            'entity' => 'produit', // the method that defines the relationship in your Model
            'model' => "App\Models\Produits", // foreign key model
            'attribute' => 'nom'
        ]);
        $this->crud->addColumn(
            [
                'name' => 'reduction',
                'type' => 'text',
                'label' => 'reduction (en %)',
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'duree',
                'type' => 'text',
                'label' => 'date de fin',
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'du_mois',
                'type' => 'boolean',
                'label' => 'produit du mois ?',
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
        CRUD::setValidation(OffresRequest::class);

        $this->crud->addField([
            'label' => "livre",
            'type' => 'select2',
            'name' => 'code_produit',// the db column for the foreign key
            // optional
            'entity' => 'produit', // the method that defines the relationship in your Model
            'model' => "App\Models\Produits", // foreign key model
            'attribute' => 'nom'
        ]);
        $this->crud->addField(
            [
                'name' => 'reduction',
                'type' => 'number',
                'label' => 'reduction (en %)',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );
        $this->crud->addField(
            [
                'name' => 'code_produit',
                'type' => 'hidden',

            ]
        );
        $this->crud->addField(
            [
                'name' => 'duree',
                'type' => 'datetime',
                'label' => 'durée offre',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );
        
        $this->crud->addField(
            [
                'name' => 'du_mois',
                'type' => 'boolean',
                'label' => 'produit du mois ?',
            ]
        );

        $code_produit=request()->input('code_produit');
        $reduction = request()->input('reduction');
        if ($code_produit!="") {
            # code...
            $produit=\DB::table('produits')->where('code',$code_produit)->first();

            $mnt = $produit->prix_achat - ($produit->prix_achat*$reduction)/100;
            $produit=\DB::table('produits')->where('code',$code_produit)->update(['prix_vente'=>$mnt]);
        }

        // request()->merge(array('prix_achat'=>$prix_achat));

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
    public function destroy($id)
{
    $this->crud->hasAccessOrFail('delete');
// dd($id);
$offre = \DB::table('offres')->where('id',$id)->first();
$produit=\DB::table('produits')->where('code',$offre->code_produit)->first();

    \DB::table('produits')->where('code',$offre->code_produit)->update(['prix_vente'=>$produit->prix_achat]);
    return $this->crud->delete($id);
}
}
