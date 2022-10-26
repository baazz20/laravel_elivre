@extends('layouts.app')
@section('title','checkout')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">checkout</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <form id="form" action="{{route('checkout.store')}}" method="post">
                    @csrf
                    <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title text-left">
                                <h3 class="title">Information personnelle</h3>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input value="{{$client->nom}}" required type="text" maxlength="50" id="nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input value="{{$client->prenom}}" required type="text" maxlength="50" id="prenom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label for="tel">téléphone</label>
                                <input value="{{$client->telephone}}" required maxlength="12" type="text" id="tel" name="tel">
                            </div>
                        </div>
                        <!-- /Billing Details -->

                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title text-left">
                                <h3 class="title">Adresse de Livraison</h3>
                            </div>
                            <div class="form-group">

                                <label for="commune">Commune</label>
                                <select name="commune" id="commune">
                                    @foreach (DB::table('communes')->get() as $commune)
                                        <option value="{{$commune->nom}}">{{$commune->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adress">Adresse</label>
                                <input name="adresse" type="text" id="adress" placeholder="koumassi remblais" required>
                            </div>
                            <div class="form-group"><br>
                                <button class="btn btn-danger btn-block text-uppercase">confirmer la commande</button>
                            </div>
                        </div>
                        <!-- /Billing Details -->
                    </form>
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-left">
                        <h3 class="title">votre commande</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Articles</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach (Cart::content() as $produit)
                                <div class="order-col">
                                    <div>{{$produit->model->nom}} <span>&nbsp; {{$produit->qty}}x </span></div>
                                    <div>{{$produit->total}} FCFA</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div>Livraison</div>
                            <div><strong>Gratuit</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">{{Cart::total()}} FCFA</strong></div>
                        </div>
                    </div>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection