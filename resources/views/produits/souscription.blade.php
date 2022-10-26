@extends('layouts.app')
@section('title','abonnement')
@section('content')

    <div class="container">
        <div class="border border-top-0 border-left-0 border-right-0 border-dark pt-3">
            <h1 class="text-center">Vous voulez emprunter un livre ?</h1>
        </div>
        <div class="pt-5">
            <div>
                {{-- <img src="{{asset('images/logo.png')}}" class="float-none float-lg-right img-fluid"> <br> --}}
                <p class="font-weight-normal" style="font-size:20px">
                    Dans l'optique d'emmener le maximum de femmes à la lecture la librairie Marthe et Marie vous donne la possibilité de souscrire à un abonnement mensuel de <strong>5000fr </strong>qui vous donne le droit de lire autant de livres que possible.
Le délais maximum de dépôt d'un livre est de <strong>1 mois.</strong>
En cas de dommage ou perte l'abonné a pour obligation de remplacer le livre par un neuf dans un délai d'<strong>une semaine</strong>.

                      <br><br>
                    laisser vos coordonnées nous vous contacterons
                 </p>
            </div>
        </div>
        <div id="billing-form" class="mb-40">
            <h4 class="checkout-title"></h4>

            <form action="{{route('abonnement.register')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-12 mb--20">
                        <label>Nom Complet * </label> <br>
                        <input class="col-9" required type="text" id="nom" name="nom" placeholder="Votre Nom">
                    </div>
                    <div class="col-6 col-md-12  mb--20">
                        <label>Numero * </label> <br>
                        <input class="col-9"  required maxlength="12" type="text" id="tel" name="tel" placeholder="Votre Numero">
                    </div>
                    <div class="col-6  col-md-12 mb--20">
                        <label>Email *</label> <br>
                        <input class="col-9" required id="email" name="email" type="email" placeholder="Votre Email">
                    </div>


                </div>
                <button class="btn btn-outline-dark" type="submit" class="">envoyer</button>
            </form>

                {{-- <div class="col-12 mb--20 ">
                    <div class="block-border check-bx-wrapper">
                        <div class="check-box">
                            <input type="checkbox" id="create_account">
                            <label for="create_account">Create an Acount?</label>
                        </div>
                        <div class="check-box">
                            <input type="checkbox" id="shiping_address" data-shipping>
                            <label for="shiping_address">Ship to Different Address</label>
                        </div>
                    </div>
                </div> --}}
                <input type="hidden" id="prix_livraison" name="prix_livraison">

            </div>
        </div>
    </div>
<br><br>

@endsection
