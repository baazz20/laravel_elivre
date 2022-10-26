<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=\Auth::user();
        $wishlists = Wishlist::where("id_client", "=", $client->id)->orderby('id', 'desc')->get();
       
        return view('client.favoris',[
            'client'=>$client,
            'wishlist'=>$wishlists,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=Wishlist::where('id_client',\Auth::user()->id)
        ->where('code_produit',$request->code_produit)
        ->first();
        // dd($status);
        if(isset($status->id_client) and isset($request->code_produit))
        {
            $wishlist = Wishlist::findOrFail($status->id);
            $wishlist->delete();
            return back()->with('toast_success','article supprimer des favoris !');

        }

        $client=\Auth::user();
        $produit=Produits::find($request->code_produit);
        $exist=false;
        $wishlist = new Wishlist;

        $wishlist->id_client = $client->id;
        $wishlist->code_produit = $request->code_produit;

        $wishlist->save();
        session()->flash('alerte', 'article ajouté aux favoris !');
        session()->flash('type', 'success');
        return back();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
      $wishlist->delete();
      session()->flash('alerte', 'article supprimer des favoris !');
      session()->flash('type', 'success');
      return back();
    }
}
