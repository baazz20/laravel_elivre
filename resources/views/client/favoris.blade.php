
@extends('layouts.app')
@section('title')
    favoris
@endsection
@section('content')

@if (count($wishlist)>0)

<section class="section-content d-none d-lg-block  bg padding-y border-top" >
    <div class="container-fluid mt-5">
     <div class="row">
        <div class="col-lg-3">
            <!-- inclure la page menu.blade.php -->
            @include('client.menu')
        </div>
      <div class="col-lg-8">
          <div class="card p-3">
            <p class="float-left" style="font-size: 25px;font-weight:bold"><i class="far fa-heart "> </i> Vos Favoris ({{\Auth::user() ?count(\Auth::user()->wishlist):0}})</p>

            <div class="card-body">
            <div class="row ">
              <div class="text-center"></div>

              <table class="table table-hover shopping-cart-wrap">
              <thead class="text-muted">
              <tr>
                <th scope="col" width="100">IMAGE</th>
                <th scope="col" width="200">PRODUIT</th>
                <th scope="col" width="150">PRIX</th>
                <th scope="col" width="150">STATUS</th>
                <th scope="col" class="text-right" width="200">ACTION</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($wishlist as $wish)
                @php  $produit = DB::table('produits')->where('code',$wish->code_produit)->first(); @endphp

                  <tr>
                    <td>
                        @php  $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg"; ;
                        if ($lien) { foreach($lien as $i){$img=$i;break;} }  @endphp
                        <div class="img-wrap"><img src="{{asset('storage/'.$img)}}" class="img-thumbnail img-sm" width="50"></div>

                    </td>
                      <td>
                      <h6 class="title text-truncate mt-4 word-limit" style="font-size: 20px;">{{$produit->nom}}</h6>

                      </td>

                      <td>
                          <div class="price-wrap">
                              <var class="price"style="color:#000;">{{getprice($produit->prix_vente)}} FCFA</var>
                          </div> <!-- price-wrap .// -->
                      </td>
                      <td>
                        <div>
                       <p class="mt-4" style="font-weight: bold">
                          {{$stock=$produit->quantite==0 ? "Indisponible" : "Disponible"}}
                       </p>
                      </div>
                    </td>
                      <td class="text-right">
                        <form action="{{route('cart.store')}}" method="POST" style="display:inline-block">
                          @if($stock==='Indisponible')

                          <span id="btn-ajout" data-original-title="Indiponible" class="btn disabled" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">Ajouter <i class="fas fa-shopping-cart "></i></span>
                           <style> #btn-ajout.disabled { opacity: 0.65; cursor: not-allowed;}</style>
                          @else
                          <button data-original-title="Ajouter au panier" type="submit" class="btn" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687">
                          Ajouter <i class="fas fa-shopping-cart "></i></button>
                          @endif
                          @csrf
                          <input type="hidden" name="code_produit" value="{{$produit->code}}">
                        </form>
                        <form action="{{route('wishlist.destroy',$wish->id)}}" method="POST" class="mt-4" style="display:inline-block">
                              @csrf
                              @method('DELETE')
                              <button data-original-title="supprimer" type="submit" class="btn btn-outline-danger " data-toggle="tooltip" style="">
                                <i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                  </tr>

              @endforeach

              </tbody>
              </table>
            </div>
          </div>
          </div>
      </div>
    </div>
      </div>
  </section>
  <section class="section-content d-block d-lg-none  bg padding-y border-top" >

  <div class="container " style=" margin-top:90px;">

   <!--
      <p class="float-left" style="font-size: 20px;font-weight:bold"><i class="far fa-heart "> </i> Vos Favoris</p>
  -->
  <a href="{{route('client.index')}}" style="color:#000;font-size:18px"><span><i class="fa fa-arrow-left float-left mt-2"></i></span></a>
  <center><p class="h5"style="color: #888;font-weight:bold;font-size:20px"><i class="far fa-heart "> </i> Vos Favoris ({{\Auth::user() ?count(\Auth::user()->wishlist):0}})</p></center><br>
  @foreach ($wishlist as $wish)
  @php  $produit = DB::table('produits')->where('code',$wish->code_produit)->first(); @endphp
  <main class="d-lg-none col-sm-9">
      <div class="card mb-3" style="box-shadow: 0px 0px 5px 0px rgba(46, 41, 41, 0.192);">
        @php $stock=$produit->quantite==0 ? "Indisponible" : "Disponible" @endphp
          <figure class="media p-2">
            @php  $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg"; ;
            if ($lien) { foreach($lien as $i){$img=$i;break;} }  @endphp
              <div class="img-wrap"><img src="{{asset('storage/'.$img)}}"  style="border:none" class="img-thumbnail img-sm"></div>
              <figcaption class="media-body text-center">
                  <h6 class="title text-truncate mt-4 word-limit" style="color: black;font-size:20px;max-width :100%">{{$produit->nom}}</h6>

                  <span style="color: #002687;font-weight:bold;font-size:17px">{{getprice($produit->prix_vente)}} </span>F
                  &nbsp;&nbsp;<del class="price-old" >{{getprice($produit->prix_achat)}} F</del>

              </figcaption>

          </figure>
          <div></div>
          <div class="card-body border-top">
            <div><span class="badge badge-pill badge-info d-lg-none" style="">{{$stock =="Indisponible"?$stock:"" }}</span></div>
            <form action="{{route('wishlist.destroy',$wish->id)}}" method="POST" class="mt-4" style="display:inline-block">
              @csrf
              @method('DELETE')
              <button data-original-title="supprimer" type="submit" class="btn btn-outline-danger " data-toggle="tooltip" style="">
                <i class="fas fa-trash"></i></button>
          </form>
          <form action="{{route('cart.store')}}" method="POST" style="display:inline-block">
            @if($stock==='Indisponible')

            <span id="btn-ajout" data-original-title="Indiponible" class="btn disabled" data-toggle="tooltip" style="background:white;border-color: #000;color:#000;">Ajouter au panier<i class="fas fa-shopping-cart "></i></span>
              <style> #btn-ajout.disabled { opacity: 0.65; cursor: not-allowed;}</style>
            @else
            <button data-original-title="Ajouter au panier" type="submit" class="btn btn-dark" data-toggle="tooltip" style="background:white;border-color: #000;color:#000">
              Ajouter au panier<i class="fas fa-shopping-cart "></i></button>
              @csrf
              <input type="hidden" name="code_produit" value="{{$produit->code}}">
              @endif
            </form>
          </div>
          </div>
      </div>
    </main>
      @endforeach
  </div>

</section>
@else
    <section class="section-content bg padding-y border-top" >
        <div class="container" style=" margin-top:80px;">
          <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
          <div class="col-lg-8">
          <a href="{{route('accueil')}}" class="d-lg-none" style="color:#002687;font-size:18px"><span><i class="fa fa-arrow-left float-left mt-2"></i></span></a>
          <center><p class="h5"style="color: #888;font-weight:bold;font-size:20px"><i class="far fa-heart "> </i> Vos Favoris ({{\Auth::user() ?count(\Auth::user()->wishlist):0}})</p></center><br>

            <center><p class="h3"style="font-weight:bold;">VOTRE LISTE EST VIDE</p><br>

                <small>içi s'afficherons vos favoris</small>
                <div class="col-md-6 mt-4 ">
                    <a href="{{route('produits.index')}}" class="btn btn-outline-dark btn-lg btn-block" type="button" style="">passez aux achats !</a>
                </div>
            </center>
        </div>
          </div>
      </div>
    </section>
    @endif

@endsection
