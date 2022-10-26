<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Produits extends Model
{
    use HasSlug;

    use CrudTrait;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nom')
            ->saveSlugsTo('code');
    }
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produits';
    protected $primaryKey = 'code';
    // public $timestamps = false;
    protected $guarded = ['code'];
    protected $fillable = ['code','description','code_souscategorie','code_categorie', 'nom','auteur', 'image', 'prix_louer1','prix_louer2', 'prix_achat', 'prix_vente', 'quantite', 'vues', 'enabled','owner_id'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $keyType='string';
    public $incrementing = false;
    protected $casts = [
        'image' => 'array'
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setImagesAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public"; // or use your own disk, defined in config/filesystems.php
        $destination_path = "produits"; // path relative to the disk above
        $this->uploadMultipleFilesToDisk($value,$attribute_name,$disk,$destination_path);

    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories','code_categorie','code');
    }
    public function sousCategories()
    {
        return $this->belongsTo('App\Models\Souscategories','code_souscategorie','code');
    }
    public function marques()
    {
        return $this->belongsTo('App\Models\Marques','code_marq','code');
    }

    public function tailles()
    {
        return $this->belongsToMany('App\Models\Tailleproduits','produit_has_taille','code_prod','code_taille');
    }

    public function couleurs()
    {
        return $this->belongsToMany('App\Models\Couleurs','produit_has_couleurs','code_prod','code_couleur');
    }

    public function owner()
    {
        return $this->belongsTo('App\User','owner_id','id');
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

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "articles/";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
