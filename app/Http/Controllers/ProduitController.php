<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Souscategories;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = request()->categorie;
        // dd($cate);
        if ($cate) {
        $categorie = Categories::find($cate);
            
            switch (request()->input('trie')) {
                case 1:
                    $produits = DB::table('produits')->where('enabled', 1)->where('quantite', '>', 0)->where('code_categorie', $cate)
                        ->orderBy('prix_vente', 'ASC')->paginate(20);
                    break;
                case 2:
                    $produits = DB::table('produits')->where('enabled', 1)->where('quantite', '>', 0)->where('code_categorie', $cate)
                        ->orderBy('prix_vente', 'DESC')->paginate(20);
                    break;
                default:
                    $produits = DB::table('produits')->orderBy('created_at', 'DESC')->where('enabled', 1)->where('quantite', '>', 0)->where('code_categorie', $cate)
                        ->paginate(20);
                    break;
            }

            // dd($produits);
        } 
       else {
            switch (request()->input('trie')) {
                case 1:
                    $produits = DB::table('produits')->where('enabled', 1)->where('quantite', '>', 0)->orderBy('prix_vente', 'ASC')->paginate(20);
                    break;
                case 2:
                    $produits = DB::table('produits')->where('enabled', 1)->where('quantite', '>', 0)->orderBy('prix_vente', 'DESC')->paginate(20);
                    break;
                default:
                    $produits = DB::table('produits')->where('enabled', 1)->where('quantite', '>', 0)->orderBy('created_at', 'DESC')->paginate(20);

                    break;
            }
            $titre = "Tous Les Produits";
        }
        $lien = array(
            isset($categorie)?$categorie->nom:"Tous les produits" => "produits.index",
           
        );
        $titre = $titre ?? 'Nos Produits';
        return view('produits.index', compact('produits', 'titre','lien', isset($categorie)??'categorie'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
   
        $produit = DB::table('produits')->where('code', $id)->first();
        /* si aucun produit avec ce nom */
        if (is_null($produit)) {
            return redirect('/');
        }
        $categorie = Categories::find($produit->code_categorie);
        // $souscategorie = Souscategories::find($produit->code_souscategorie);
        $lien = array(
            $categorie->nom => "produits.index",
            // $souscategorie->nom => "produits.index",
            $produit->nom => "produits.show"
        );
        return view('produits.detail', compact('produit', 'lien', 'categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $q = request()->input('q');

        request()->validate([
            'q' => 'required|min:3'
        ]);

        $products = DB::table('produits')->where('nom', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->paginate(36);
        $titre = "";
        // $lien = array(
        //     "tout les produits" => "produits.index",
        //     "$q" => 'produits.index'
        // );
        return view('produits.recherche')->with(['produits' => $products, 'titre' => $titre, 'categories_coches' => []]);
    }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
