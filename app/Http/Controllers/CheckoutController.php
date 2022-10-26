<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produits;
use App\Models\Commande;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        /* une variable session */
        $client = Auth::user();
        
        return view('checkout.index', compact('client'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Vérification du stock
        $items = \Cart::Content();
        foreach ($items as $row) {
            $product = Produits::findOrFail($row->id);
            //dd($row->qty);
            if ($product->quantite < $row->qty) {
                session()->flash('alerte', 'Nous sommes désolés mais le produit "' . $row->name . '" ne dispose pas d\'un stock suffisant pour satisfaire votre demande. Il ne reste que ' . $product->quantite . ' exemplaires disponibles.');
                session()->flash('type', 'success');
                return back();
            }

        }

        /* vars */
        $client = Auth::user();
        $numero = trim($request->get('tel'));
        $communev = request()->input('commune');
        $clientid = $client->id;
        $prix_livraison = request()->input('prix_livraison');
        /* mise à jour du numero */
        if ($client->telephone != $numero) {
            $client->telephone = $numero;
            $client->save();
        }
        /* Info sur la commune */
        $commune = \DB::table('communes')->where('nom', $communev)->first();

        /* inseration d'une nouvelle adresse */
        $adresse = new Adresse();
        $adresse->id_client = $clientid;
        $adresse->code_commune = $commune->code;
        $adresse->description = $request->adresse;
        $saved = $adresse->save();

        /* if insert successful */
        if ($saved) {
            /* enregistrer la commande */
            // dd(intval(getGoodPrix(\Cart::total()))+intval($prix_livraison));
            $mtn_total =  getGoodPrix(\Cart::total())+intval($prix_livraison);
            $id_c = \DB::table('commandes')->insertGetId(array('id_client' => $client->id, 'id_adr' => $adresse->id, 'montant' => $mtn_total, 'quantite' => \Cart::count(),'prix_livraison'=>$prix_livraison, "created_at" => now(), "updated_at" => now()));
            /* enregistrer les details */
            foreach (\Cart::content() as $produit) {
              
                \DB::table('detailcommandes')->insert(array('id_commande' => $id_c, 'code_prod' => $produit->model->code,  'quantite' => $produit->qty, 'prix_vente' => $produit->options['prix']??$produit->model->prix_vente, 'prix_achat' => $produit->model->prix_achat, 'type_paye'=>$produit->options['type_paye']??"acaht" ));
            }
            
            /* envoie du mail */
            $data = [
                'subject' => 'Nouvelle Commande sur martheetmarie.com',
                'from' => 'martheetmarie.com@gmail.com',
                'from_name' => 'martheetmarie.com',
                'template' => 'mail.ordernew',
                'info' => [
                    'fullname' => $client->nom . ' ' . $client->prenom,
                    'id_commande' => $id_c,
                    'date' => now(),
                    'quantite' => \Cart::count(),
                    'montant' => $mtn_total,
                    'lien' => 'http://www.martheetmarie.com/',
                    'nom_lien' => 'se connecter'
                ]
            ];
            $data2 = [
                'subject' => 'Confirmation de Commande',
                'from' => 'martheetmarie.com@gmail.com',
                'from_name' => 'martheetmarie.com',
                'template' => 'mail.neworder',
                'info' => [
                    'fullname' => $client->nom . ' ' . $client->prenom,
                    'id_commande' => $id_c,
                    'date' => now(),
                    'quantite' => \Cart::count(),
                    'montant' => $mtn_total,
                    'lien' => 'http://www.martheetmarie.com/',
                    'nom_lien' => 'se connecter'
                ]
            ];
            
            $email_martheetmarie = \DB::table("settings")->where("name","email")->first()->value;
            $details['type_email'] = 'neworder';
            $details['email'] = $email_martheetmarie;
            $details['data'] = $data;

            $details2['type_email'] = 'neworder';
            $details2['email'] = $client->email;
            $details2['data'] = $data2;
  
            dispatch(new \App\Jobs\SendEmailJob($details));
            dispatch(new \App\Jobs\SendEmailJob($details2));

            

            /* modifier le stock */
            $this->updateStock();

            /* supprimer le panier */
            \Cart::destroy();
            /* afficher les messages */
            $request->session()->put('num', $id_c);
            session()->flash('alerte', 'commande effectué avec succès .');
            session()->flash('type', 'success');
            return redirect()->route('checkout.confirmation');
        }
        /* else if */
        session()->flash('alerte', 'une erreur est survenue pendant la validation de la commande , veuillez réessayer .');
        session()->flash('type', 'danger');
        return redirect()->back();
    }

    public function updateStock()
    {
        foreach (\Cart::content() as $item) {
            $produit = Produits::find($item->model->code);
            $produit->update([
                'quantite' => $produit->quantite - $item->qty,
            ]);
        }
    }


    public function confirmation()
    {
        return view('checkout.confirmation');
    }

    /**
     * Display the specified resource.
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
