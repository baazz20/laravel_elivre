<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommandeDetail extends Model
{
    use SoftDeletes;

    protected $table = 'detailcommandes';
    protected $guarded = ['id'];
    protected $fillable = ['id', 'code_prod', 'code_couleur', 'code_taille', 'quantite', 'prix_vente','prix_achat'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /*
   |--------------------------------------------------------------------------
   | RELATIONS
   |--------------------------------------------------------------------------
   */
    public function couleur()
    {
        return $this->belongsTo('App\Models\Couleurs','code_couleur','code');
    }

    public function taille()
    {
        return $this->belongsTo('App\Models\Tailleproduits','code_taille','code');
    }

    public function produits(){
        return $this->belongsTo('App\Models\Produits','code_prod','code');
    }
}
