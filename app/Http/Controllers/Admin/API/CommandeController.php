<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandePController extends Controller
{
    /*
     * liste des commandes
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $page = (int)$request->input('page');
        $commande = Commande::with(['client', 'adresse.commune', 'detail.taille', 'detail.couleur']);
        if ($status !== 'null') {
            $commande->where('status', '=', (int)$status);
        }
        $data = $commande->paginate(10);
        return view("admin_ext.commande");
    }


    /*
     * voir les details d'une commande
     */
    public function show(Request $request)
    {
        /* l'id du partenaire */
        $id = backpack_user()->id;
        /* detail d'une commande */
        $id = (int)$request->query('id');
        $commande = Commande::with(['client', 'adresse.commune', 'detail.taille', 'detail.produits.owner', 'detail.couleur']);
        $commande->whereHas('detail', function ($query) use ($id) {
            $query->whereHas('produits', function ($query2) use ($id) {
                return $query2->where('owner_id', '=', $id);
            });
        });
        $data = [];
        if (is_int($id)) {
            $order = $commande->where('id', '=', $id);
            $data = $order->first();
        }
        return response()->json($data, 200);
    }

}
