<?php

namespace App;

use App\Models\Clients;
use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlists";

    public function user()
    {
        return $this->belongsTo(Clients::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produits::class,'code_produit','code');
    }
}
