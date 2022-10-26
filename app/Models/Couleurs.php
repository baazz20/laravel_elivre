<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Couleurs extends Model
{
    use CrudTrait;
    use SoftDeletes;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'couleurs';
    protected $primaryKey = 'code';
    // public $timestamps = false;
    protected $guarded = ['code'];
    protected $fillable = ['code','nom'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $keyType='string';
    public $incrementing = false;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function produits()
    {
        return $this->belongsToMany('App\Models\Produits','produit_has_couleurs','code_couleur','code_prod');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
