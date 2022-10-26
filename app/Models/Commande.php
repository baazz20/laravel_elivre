<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;

    protected $table = 'commandes';
    protected $guarded = ['id'];
    protected $fillable = ['id', 'id_client', 'id_detail_com', 'id_adr', 'quantite', 'status','deleted_at'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients','id_client','id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\CommandeDetail','id_commande','id');
    }

    public function adresse()
    {
        return $this->belongsTo('App\Models\Adresse','id_adr','id');
    }


}
