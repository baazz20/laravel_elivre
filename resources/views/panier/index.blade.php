@extends('layouts.app')
@section('title','votre panier')
@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @if (Cart::count()>0)
        {{-- affichage du panier pour ecran large  --}}
        <section class="section-content d-none d-lg-block bg padding-y border-top">
            <div class="container" style=" margin-top:80px;">
                <center>
                    <p class="h3" style="color: #888;font-weight:bold;">VOTRE PANIER ( {{Cart::count()}} )</p>
                </center>
                <br>

                <div class="row">
                    <main class="col-sm-9">

                        <div class="card">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                <tr>
                                    <th scope="col" width="1"></th>

                                    <th scope="col" width="80">IMAGE</th>
                                    <th scope="col" width="150">PRODUIT</th>
                                    <th scope="col" width="150">PRIX</th>
                                    <th scope="col" width="100">QUANTITE</th>
                                    <th scope="col" width="150" class="text-right">TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (Cart::content() as $produit)
                                    <tr>
                                        <td class="text-right" >

                                            <form style="border:none" class=" mt-3"
                                                  action="{{route('cart.supprime',$produit->rowId)}}" method="POST">
                                                @csrf
                                                <input name="produit_id" type="hidden"
                                                       value="{{$produit->model->code}}">
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" style="width:0px">×</button>
                                            </form>
                                        </td>
                                        <td>
                                            @php  $liens=$produit->model->image; $lien=$liens; $img="img.jpg"; ;
                if ($lien) { foreach($lien as $i){$img=$i;break;} }  @endphp
                                            <div class="img-wrap"><img src="{{asset('storage/'.$img)}}"
                                                                       class="img-thumbnail img-sm" width="100"></div>

                                        </td>

                                        <td>
                                            <h6 class="title text-truncate mt-4" style="font-size: 20px;text-transform:lowercase;width:200px">
                                                {{$produit->model->nom}}</h6>


                                        </td>
                                        <td>
                                            <div class="price-wrap mt-4">
                                                <p class="price" style="color:black;font-weight:bold ">
                                                    {{-- @dd($produit) --}}
                                                    {{$produit->options['prix']??$produit->model->prix_vente}} FCFA</P>

                                            </div>
                                        </td>
                                        <td>

                                            <input type="hidden" id="max_qty" name="max_qty"
                                                   value="{{$produit->model->quantite}}">

                                            <div class="mt-2 border rounded border-color-1 p-1"
                                                 style="width: 80px;">
                                                {{-- <div class="js-quantity row align-items-center"> --}}
                                                     <div class="col-auto">
                                                       

                                                    </div> 
                                                    <div class="row">
                                                        
                                                         <a class="col-5"
                                                           href="{{url('/panier/update/'.$produit->model->quantite.'/'.$produit->rowId.'/'.($produit->qty-1))}}">
                                                            <small class="fas fa-minus btn-icon__inner"></small>
                                                        </a>
                                                        <input name="qty" id="qty" data-id="{{$produit->rowId}}"
                                                        style="background-color:transparent"
                                                        class="js-result form-control h-auto border-0 rounded p-0 shadow-none col-2"
                                                        type="text" value="{{$produit->qty}}">
                                                        <a class="col-1"
                                                           href="{{url('panier/update/'.$produit->model->quantite.'/'.$produit->rowId.'/'.($produit->qty+1))}}">
                                                            <small class="fas fa-plus btn-icon__inner"></small>
                                                        </a>
                                                    </div>
                                                {{-- </div> --}}
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price-wrap mt-4">

                                                <p class="price text-right"
                                                   style="color:black;font-weight:bold ">{{$produit->subtotal()}}
                                                    FCFA</p>

                                            </div> <!-- price-wrap .// -->
                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="card-body border-top">
                                <a href="{{route('checkout.index')}}" class="btn btn-light float-md-right"
                                   style="font-weight:bold;font-size:18px"> Finaliser la commande &nbsp;<i
                                            class="fa fa-chevron-right" style="color: #002687"></i> </a>
                                <a href="{{route('produits.index')}}" class="btn btn-light"
                                   style="font-weight:bold;font-size:18px"> <i class="fa fa-chevron-left"
                                                                               style="color: #002687"></i> &nbsp;Continuer
                                    ses achats </a>
                            </div>
                        </div> <!-- card.// -->
                        {{-- <div class="alert alert-success mt-3 p-1 pl-5 ">
                            <p class="icontext" style="font-weight: bold"><i class="icon text-success fa fa-truck"></i>&nbsp;Livraison
                                gratuite & rapide</p>
                        </div> --}}
                    </main> <!-- col.// -->
                    <aside class="col-md-3">

                        <div class="card">
                            <div class="card-body">
                                <dl class="row row-cols-2">
                                    <dt class="text-left">SOUS TOTAL :</dt>
                                    <dd class="text-right"
                                        style="width:55%;margin-left:-20px;font-weight:bold;color: #000">{{(Cart::subtotal())}}
                                        Fcfa
                                    </dd>
                                </dl>

                                <dl class="row row-cols-2 dlist-align">
                                    <dt class="text-left">TOTAL :</dt>
                                    <dd class="text-right"
                                        style="width:55%;margin-left:-20px;font-weight:bold;color: #6852ED">{{Cart::total()}}
                                        Fcfa
                                    </dd>
                                </dl>

                                <hr>


                            </div> <!-- card-body.// -->
                        </div>  <!-- card .// -->
                    </aside>
                </div>

            </div> <!-- container .//  -->
        </section>
        <section class="section-content d-block d-lg-none bg padding-y border-top">
            <div class="container" style=" margin-top:50px;">
                <a href="{{route('produits.index')}}" style="color:#000;font-size:18px"><span><i
                                class="fa fa-arrow-left float-left mt-2"></i></span></a>

                <center><p class="h5" style="color: #888;font-weight:bold;">VOTRE PANIER ( {{Cart::count()}} )</p>
                </center>
                <br>

                <main class="col-sm-9">
                    @foreach (Cart::content() as $produit)
                        <div class="card mb-3" style="box-shadow: 0px 0px 5px 0px rgba(46, 41, 41, 0.192);">

                            <figure class="media p-2">
                                @php  $liens=$produit->model->image; $lien=$liens; $img="img.jpg";
                    if ($lien) { foreach($lien as $i){$img=$i;break;} } @endphp
                                <div class="img-wrap"><img src="{{asset('storage/'.$img)}}"
                                                           style="border:none;width:100%;height:150px"
                                                           class="img-thumbnail img-sm"></div>
                                <figcaption class="media-body text-center">
                                   
                                    <h6 class="title text-truncate mt-2 word-limit"
                                        style="color: black;font-size:20px;width :150px;text-transform:lowercase;">{{$produit->model->nom}}</h6>

                                    <span style="color: #002687;font-weight:bold;font-size:17px">{{getprice($produit->model->prix_vente)}} </span>F
                                    <del class="price-old">{{getprice($produit->model->prix_achat)}} F</del>

                                </figcaption>
                            </figure>
                            <div class="card-body border-top">
                                <div class="row row-cols-2">

                                    <div class="col">
                                        <form style="border: none;margin:0"
                                              action="{{route('cart.supprime',$produit->rowId)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" style="width:5px"><i
                                                        class="fa fa-trash text-danger" style="font-size: 20px"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col" style="background: olie;margin-left:-10%">
                                        <input type="hidden" id="max_qty" name="max_qty"
                                               value="{{$produit->model->quantite}}">
                                               <div class="mt-2 border rounded border-color-1 p-1"
                                               style="width: 80px;">
                                              {{-- <div class="js-quantity row align-items-center"> --}}
                                                   <div class="col-auto">
                                                     

                                                  </div> 
                                                  <div class="row">
                                                      
                                                       <a class="col-5"
                                                         href="{{url('/panier/update/'.$produit->model->quantite.'/'.$produit->rowId.'/'.($produit->qty-1))}}">
                                                          <small class="fas fa-minus btn-icon__inner"></small>
                                                      </a>
                                                      <input name="qty" id="qty" data-id="{{$produit->rowId}}"
                                                      style="background-color:transparent"
                                                      class="js-result form-control h-auto border-0 rounded p-0 shadow-none col-2"
                                                      type="text" value="{{$produit->qty}}">
                                                      <a class="col-1"
                                                         href="{{url('panier/update/'.$produit->model->quantite.'/'.$produit->rowId.'/'.($produit->qty+1))}}">
                                                          <small class="fas fa-plus btn-icon__inner"></small>
                                                      </a>
                                                  </div>
                                              {{-- </div> --}}
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </main>

            </div>
        </section>
        <hr>
        <section class="mb-4 d-lg-none">

            <div class="mt-3 col-sm-12" style="background: white">

                <center style="font-size: 18px">
                    <span class="text-left" style="font-weight: bold">sous total :</span>
                    <span class="text-right" style="font-weight: bold;color:black">{{(Cart::subtotal())}}</span> Fcfa
                </center>

                <center style="font-size: 18px">
                    <span class="text-left" style="font-weight: bold">Total :</span>
                    <span class="text-right" style="font-weight: bold;color:#6852ED">{{($total)}}</span> Fcfa
                </center>


                <center class="mt-2">
                    <a href="{{route('checkout.index')}}" class="btn btn-outline-dark "
                       style="font-weight:bold;font-size:18px;">
                        Finaliser la commande &nbsp;<i class="fa fa-chevron-right" style="color: #6852ED"></i> </a>
                    <a href="{{route('produits.index')}}" class="btn btn-outline-dark mt-2"
                       style="font-weight:bold;font-size:18px;">
                        <i class="fa fa-chevron-left" style="color: #6852ED"></i> &nbsp;Continuer ses achats </a>
                </center>
            </div>
        </section>
    @else
        <section class="section-content bg padding-y border-top" style="height: 60vh">
            <div class="container" style=" margin-top:100px;">

                <center><p class="h3" style="font-weight:bold;">VOTRE PANIER EST VIDE</p><br>
                    <p>ajouter des produits dans votre panier</p>
                    <div class="col-md-6 mt-4 ">
                        <a href="{{route('produits.index')}}" class="btn rounded-0 btn-outline-dark btn-lg btn-block"
                           type="button" style="">passez aux achats !</a>
                    </div>
                </center>
            </div>
        </section>
    @endif

@endsection

@section('extra-js')
    <script>

        function plus(s) {
            var v = document.getElementById("qty");
            var q = parseInt(v.value) + 1;
            v.value = q;
        }

        function moins(s) {
            var v = document.getElementById("qty");
            var q = parseInt(v.value) - 1;
            v.value = q;
        }

    </script>
    {{-- @include('sweetalert::alert') --}}
@endsection