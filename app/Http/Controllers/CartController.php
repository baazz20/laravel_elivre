<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Cart::subtotal();

        return view('panier.index', [
            "total" => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request["type_paye"]);
        if($request["type_paye"]=="louer"){
            return redirect()->route('abonnement.index');

        }
        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->code_produit;
        });

        if ($duplicate->isNotEmpty()) {
            session()->flash('alerte', 'Le produit a deja été ajouté');
            session()->flash('type', 'success');
            return redirect()->route('cart.index');
        }
        $produit = Produits::find($request->code_produit);
        $prix= $request->prix?? $produit->prix_vente;

        Cart::add($request->code_produit, $produit->nom, $request->qte ?? 1, $prix, ['type_paye' => $request->type_paye, "prix" => $request->prix])
            ->associate('App\Models\Produits');

        session()->flash('alerte', 'Le produit a bien été ajouté');
        session()->flash('type', 'success');
        session()->put('achat-encours', true);
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($stock, $rowId, $qty)
    {
        if ($qty > $stock) {
            session()->flash('alerte', 'erreur quantité disponible : ' . $stock);
            session()->flash('type', 'error');
            return redirect()->route('cart.index');
        }
        Cart::update($rowId, $qty);
        session()->flash('alerte', 'panier mis à jour !');
        session()->flash('type', 'success');
        return redirect()->route('cart.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        session()->flash('alerte', 'article supprimer !');
        session()->flash('type', 'success');
        return back();
    }
}
