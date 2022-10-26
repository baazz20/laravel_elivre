<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /*
     * liste des commandes
     */
    public function index(Request $request)
    {
        /* status de la commande */
        $status = $request->input('status');
        $page = (int)$request->input('page');
        $commande = Commande::with(['client', 'adresse.commune', 'detail.taille', 'detail.couleur']);
        if ($status !== 'null') {
            $commande->where('status', '=', (int)$status);
        }
        $data = $commande->paginate(10);
        return response()->json($data, 200);
    }


    /*
     * voir les details d'une commande
     */
    public function show(Request $request)
    {
        /* detail d'une commande */
        $id = (int)$request->query('id');
        $commande = Commande::with(['client', 'adresse.commune','detail.produits.owner']);
        $data = [];
        if (is_int($id)) {
            $order = $commande->where('id', '=', $id);
            $data = $order->first();
        }
        return response()->json($data, 200);
    }

    /***
     * changer le status d'une commande
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        try {
            $commande_id = (int)$request->query('id');
            $status = (int)$request->query('status');
            $commande = Commande::find($commande_id);
            if (!is_null($commande)) {
                $commande->status = $status;
                $commande->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'success'
                ], 200);
            }

            return response()->json([
                'status' => 400,
                'message' => 'aucune commande.'
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                'status' => $ex->getCode(),
                'message' => $ex->getMessage()
            ]);
        }
    }
}
