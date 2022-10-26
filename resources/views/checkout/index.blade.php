@extends('layouts.app')
@section('title','checkout')
@section('content')

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Accueil</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <form id="form" action="{{route('checkout.store')}}" method="post">
                        @csrf
                    <div class="row row-40">
                        <div class="col-12">
                            <h1 class="quick-title">Checkout</h1>
                            <!-- Slide Down Trigger  -->
                            <div class="checkout-quick-box">
                                <p><i class="far fa-sticky-note"></i>Renseignez vos informations</p>
                            </div>
                            <!-- Slide Down Blox ==> Login Box  -->
                            {{-- <div class="checkout-slidedown-box" id="quick-login">
                                <form action="./">
                                    <div class="quick-login-form">
                                        <p>If you have shopped with us before, please enter your details in the
                                            boxes below. If you are a new
                                            customer
                                            please
                                            proceed to the Billing & Shipping section.</p>
                                        <div class="form-group">
                                            <label for="quick-user">Username or email *</label>
                                            <input type="text" placeholder="" id="quick-user">
                                        </div>
                                        <div class="form-group">
                                            <label for="quick-pass">Password *</label>
                                            <input type="text" placeholder="" id="quick-pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#" class="btn btn-outlined   mr-3">Login</a>
                                                <div class="d-inline-flex align-items-center">
                                                    <input type="checkbox" id="accept_terms" class="mb-0 mr-1">
                                                    <label for="accept_terms" class="mb-0">I’ve read and accept
                                                        the terms &amp; conditions</label>
                                                </div>
                                            </div>
                                            <p><a href="javascript:" class="pass-lost mt-3">Lost your
                                                    password?</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <!-- Slide Down Trigger  -->
                            {{-- <div class="checkout-quick-box">
                                <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
                                        class="slide-trigger" data-target="#quick-cupon">
                                        Click here to enter your code</a></p>
                            </div> --}}
                            <!-- Slide Down Blox ==> Cupon Box -->
                            {{-- <div class="checkout-slidedown-box" id="quick-cupon">
                                <form action="./">
                                    <div class="checkout_coupon">
                                        <input type="text" class="mb-0" placeholder="Coupon Code">
                                        <a href="" class="btn btn-outlined">Apply coupon</a>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <div class="col-lg-7 mb--20">
                            
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Information Personnel</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Nom*</label>
                                        <input value="{{$client->nom}}" required type="text" id="nom" name="nom" placeholder="Votre Nom">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Prénom*</label>
                                        <input value="{{$client->prenom}}" required id="prenom" name="prenom" type="text" placeholder="Votre Prénom">
                                    </div>
                                   
                                  
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Téléphone*</label>
                                        <input value="{{$client->telephone}}" required maxlength="12" type="text" id="tel" name="tel" placeholder="Votre Numero">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Addresse de Livraison*</label> <br> 
                                        <label>Commune</label>
                                        <select onchange="change(this.value)" style="width:100%;background-color: #f4f4f4;border: 1px solid transparent;line-height: 23px;
                                        padding: 10px 20px; font-size: 14px; color: #14191e; margin-bottom: 15px;" name="commune" id="commune">
                                            @foreach (DB::table('communes')->get() as $commune)
                                                <option value="{{$commune->nom}}">{{$commune->nom}}</option>
                                            @endforeach
                                        </select> 
                                        <label>Adresse</label>
                                <input name="adresse" type="text" id="adress" value="" placeholder="koumassi remblais" required>

                                     
                                    </div>
                                   
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
                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12">
                                    <div class="checkout-cart-total">
                                        <h2 class="checkout-title">VOTRE COMMANDE</h2>
                                        <h4>Articles <span>Total</span></h4>
                                        <ul>
                                            @foreach (Cart::content() as $produit)
                                            <li><span class="left">{{$produit->model->nom}} X {{$produit->qty}}</span> <span
                                                    class="right">{{$produit->total}} F</span></li>
                                            @endforeach
                                        </ul>
                                        <p>Sous Total <span id="soustotal">{{getGoodPrix(Cart::total())}}</span></p>
                                        <p>Livraison <span id="c_livraison"></span></p>
                                        <h4>Total <span id="total"></span></h4>
                                        <script>
                                       prix_livraison =1000;
                                       document.getElementById('prix_livraison').value=prix_livraison;
                                        document.getElementById('c_livraison').innerText=prix_livraison;
                                        document.getElementById('total').innerText=parseInt(document.getElementById('soustotal').innerText)+prix_livraison + " F";
                                        //    console.log(prix_livraison);
                                       function change(val){
                                           if(val.toLowerCase()!="cocody") prix_livraison =1500;
                                           else prix_livraison =1000;
                                           document.getElementById('prix_livraison').value=prix_livraison;
                                           document.getElementById('c_livraison').innerText=prix_livraison;
                                        document.getElementById('total').innerText=parseInt(document.getElementById('soustotal').innerText)+prix_livraison + " F";

                                        //    console.log(document.getElementById('livraison').value);
                                       }
                                   </script>
                                        <div class="method-notice mt--25">
                                            paiement à la livraison
                                            {{-- <article>
                                                <h3 class="d-none sr-only">blog-article</h3>
                                                Sorry, it seems that there are no available payment methods for
                                                your state. Please contact us if you
                                                require
                                                assistance
                                                or wish to make alternate arrangements.
                                            </article> --}}
                                        </div>
                                        {{-- <div class="term-block">
                                            <input type="checkbox" id="accept_terms2">
                                            <label for="accept_terms2">I’ve read and accept the terms &
                                                conditions</label>
                                        </div> --}}
                                        <button class="place-order w-100 btn btn--primary">confirmer la commande</button> <br>
                                        <a href="/produits" class="w-100 btn btn-outline-dark">annuler</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection