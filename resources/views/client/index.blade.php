@extends('layouts.app')

@section('title','mon compte')

@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Accueil</a></li>
                    <li class="breadcrumb-item active">Mon Compte</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="page-section inner-page-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Commandes</a>
                            
                            {{-- <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                Favoris  <span class="price">{{\Auth::user() ?count(\Auth::user()->wishlist):0}}</span></a>
                            --}}
                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                addresse</a>
                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i>
                                Details Compte</a>
                            <a href="{{url('/deconnexion')}}"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                        <p>Hello, <strong>{{Auth::user()->nom}} {{Auth()->user()->prenom}}</strong></p>
                                    </div>
                                    <p class="mb-0">Dans votre dashboard. Vous pouvez facilement voir vos recentes
                                        commandes, vos articles favoris, aussi modifier votre adresse de livraison ainsi
                                        que vos
                                        informations personnel.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Commandes</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>N° </th>
                                                    <th>Nbre article</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($commandes) && count($commandes)>0)
                                                @foreach ($commandes as $cmd)
                                                <tr>
                                                    <td>{{$cmd->id}}</td>
                                                    <td>{{$cmd->quantite}}</td>
                                                    <td>{{$cmd->created_at}}</td>
                                                    <td>
                                                        @php
                                                        switch($cmd->status){
                                                        case 0: echo "En attente";break;
                                                        case 1: echo "Confirmer";break;
                                                        case 2: echo "Annuler";break;
                                                        }
                                                        @endphp
                                                    </td>
                                                    <input type="hidden" name="id_cmd" val>
                                                    <td>{{$cmd->montant}}</td>
                                                    <td><a href={{route('client.detailcommande', $cmd->id)}} data-id="{{$cmd->id}}" data-total="{{$cmd->montant}}" data-dat="{{$cmd->created_at}}" data-toggle="modal"
                                                            data-target="quickModa" class="btn open">Voir</a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            {{ $commandes->links() }}
                                        </table>
                                   

                                        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>

                                        <script>
                                            
                                            $('.open').click(function(event) {
        event.preventDefault();

        var url = $(this).attr('href');

        $("#quickModal").modal('show');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
        })
        .done(function(response) {
            $("#quickModal").find('.table-responsive').html(response);
        });

    });
    $(document).on("click", ".open", function () {
                                                var id_cmd = $(this).data('id');
                                                var date = $(this).data('dat');
                                                var total = $(this).data('total');
                                                // alert(id_cmd);
     $(".modal #num").html( id_cmd );
     $(".modal #date").html( date );
     $(".modal #total").html( total );
                                                }); 
</script>
                                          
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Favoris</h3>
                                   
                                    <div class="row">
                                        @foreach ($wishlist as $wish)
                                        @php $produit =
                                        DB::table('produits')->where('code',$wish->code_produit)->first(); @endphp
                                        @php $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg"; ;
                                        if ($lien) { foreach($lien as $i){$img=$i;break;} } @endphp
                                        <div class="col-lg-4 col-6 p-lg-4 mt-1" style="background-color: ;height:200px">

                                            <img onclick="alert('ok')" src="{{asset('storage/'.$img)}}"
                                                style="cursor: pointer;width: 100%;height:100%">

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Addresse</h3>
                                    <address>
                                        <p><strong>{{Auth()->user()->nom}} {{Auth()->user()->prenom}}</strong></p>
                                        <p>{{$ville}}, {{$commune}} <br>
                                            {{$adresse ?$adresse->description:""}}</p>
                                        <p>Numero: {{Auth()->user()->telephone}}</p>
                                    </address>
                                    <a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Editer l'Adresse</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Details Compte</h3>
                                    <div class="account-details-form">
                                        <form method="POST" action="{{route('client.updateinfo')}}"
                                            style="border: none">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input class="w-100" name="nom" type="text" placeholder="Nom"
                                                        value="{{Auth::user()->nom}}" required>
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input class="w-100" placeholder="prenom" name="prenom" type="text"
                                                        value="{{Auth::user()->prenom}}" required>
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input class="w-100" placeholder="numero" name="telephone"
                                                        type="text" value="{{Auth::user()->telephone}}" required>
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="email" placeholder="Email Address" type="email"
                                                        name="email" type="text" value="{{Auth::user()->email}}"
                                                        required>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <h4>modifier mot de passe</h4>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="current-pwd" name="motdepasse"
                                                        placeholder="Mot de passe actuel" type="password">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="new-pwd" name="nouveau_motdepasse"
                                                        placeholder="Nouveau mot de passe" type="password">
                                                </div>
                                                {{-- <div class="col-lg-6 col-12  mb--30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password"
                                                        type="password">
                                                </div> --}}
                                                <div class="col-12">
                                                    <button class="btn btn--primary">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="product-details-modal">

                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="order-complete-message text-center">
                                    <h1>Detail Commande!</h1>
                                    {{-- <p>Your order has been received.</p> --}}
                                </div>
                                <ul class="order-details-list">
                                    <li>Comùmande N°: #<strong id="num" ></strong></li>
                                    <li>Date: <strong id="date"></strong></li>
                                    <li>Total: <strong id="total"></strong></li>
                                    <li>Methode de Paiement: <strong>Paiement à la livraison</strong></li>
                                </ul>
                           
                                
                                {{-- <p>Pay with cash upon delivery.</p> --}}
                                <h3 class="order-table-title">Articles </h3>
                                <div class="table-responsive">
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
</div>
@endsection