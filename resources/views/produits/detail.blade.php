@extends('layouts.app')
@section('title')
    {{$produit->nom}}
@endsection
@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}">Accueil</a></li>
                    @foreach ($lien as  $item=>$i)

                        @if ($item==$categorie->nom)
                            <li class="breadcrumb-item"><a
                                        href="{{route($i,['categorie'=>$categorie->code])}}">{{$item}}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item"><a href="#">{{$item}}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row  mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
      "slidesToShow": 1,
      "arrows": false,
      "fade": true,
      "draggable": false,
      "swipe": false,
      "asNavFor": ".product-slider-nav"
      }'>
      @php $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg";
            if ($lien) { foreach($lien as $i){$img=$i;break;} }  @endphp
             @foreach ($lien as $img)
                    <div class="single-slide">
                        <img src="{{asset('storage/'.$img)}}" alt="" height="400">
                    </div>
                    @endforeach

                </div>
                <!-- Product Details Slider Nav -->
                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
    "infinite":true,
      "autoplay": true,
      "autoplaySpeed": 8000,
      "slidesToShow": 4,
      "arrows": true,
      "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
      "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
      "asNavFor": ".product-details-slider",
      "focusOnSelect": true
      }'>
      @foreach ($lien as $img)
      <div class="single-slide">
        <img src="{{asset('storage/'.$img)}}" alt="">
      </div>
      @endforeach

                </div>
            </div>
            <div class="col-lg-7">
                @php $offre = \DB::table('offres')->where('code_produit',$produit->code)->first(); @endphp
                <div class="product-details-info pl-lg--30 ">
                    {{-- <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p> --}}
                    <h3 class="product-title">{{$produit->nom}}</h3>

                    @if ($offre && intval($offre->reduction)!=0)

                    <p style="float:right;color:#EE00AA;border-bottom:2px solid #EE00AA;font-weight:bold">-{{$offre->reduction}}%</p> @endif
                    <ul class="list-unstyled">
                        @if($produit->auteur) <li style="font-size:18px">Auteur : <a href="#" class="list-value font-weight-bold"> {{$produit->auteur}}</a></li> @endif
                    </ul> <br>


                    <div class="price-block">
                        <span>prix : </span> <span class="price-new">{{$produit->prix_vente}} FCFA</span>
                        <!-- <del class="price-old">{{$produit->prix_achat}} FCFA</del> -->
                        @if ($offre && intval($offre->reduction)!=0)<del class="price-old">{{$produit->prix_achat}} fcfa</del> @endif
                    </div>
                    <form id="form" action="{{ route('cart.store') }}" method="POST" style="border:none">
                        @csrf

                    <div class="">
                        <input type="hidden" name="type_paye" id="type">
                        @php
                            $prix_louer1= 3000;
                            $prix_louer2= 5000;
                        @endphp
                        {{-- <div class="form-check">

                            <input type="radio" name="prix" id="acheter" checked value="{{$produit->prix_vente}}" onchange="change('achat')">
                            <label class="form-check-label" for="acheter">
                              Acheter
                            </label>
                          </div> --}}
                          <br>
                          {{-- <div class="form-check">
                            <input type="radio" name="prix" id="louer" onchange="change('louer')">
                            <label class="form-check-label" for="louer">
                                Emprunter
                            </label>
                          </div> --}}
                          {{-- <div class="form-check">
                              <br>
                              <span style="color:grey">avec l'abonnement mensuel vous avez la possibilité <br>d'emprunter un ou plusieurs livres par mois</span>

                          </div> --}}

                          <!--<div class="form-check">-->
                          <!--  <input type="radio" name="prix" id="louer1" value="{{$prix_louer1}}" onchange="change('louer1')">-->
                          <!--  <label class="form-check-label" for="louer1">-->
                          <!--      Louer pour 15 jours à {{$prix_louer1}} f-->
                          <!--  </label>-->
                          <!--</div>-->
                          <!--<div class="form-check">-->
                          <!--  <input type="radio" name="prix" id="louer2" value="{{$prix_louer2}}" onchange="change('louer2')">-->
                          <!--  <label class="form-check-label" for="louer2">-->
                          <!--      Louer pour 1 mois à {{$prix_louer2}} f-->
                          <!--  </label>-->
                          <!--</div>-->


                    </div> <br>
                    <script>
                        function change(t){
                            document.getElementById('type').value =t;
                            // alert(t);
                        }
                    </script>
                    {{-- <div class="rating-widget">
                        <div class="rating-block">
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star star_on"></span>
                            <span class="fas fa-star "></span>
                        </div>
                        <div class="review-widget">
                            <a href="">(1 Reviews)</a> <span>|</span>
                            <a href="">Write a review</a>
                        </div>
                    </div> --}}
                    {{-- <article class="product-details-article">
                        <h4 class="sr-only">Product Summery</h4>
                        <p>Long printed dress with thin adjustable straps. V-neckline and wiring under the Dust
                            with ruffles at the bottom of the
                            dress.</p>
                    </article> --}}

                    <div class="add-to-cart-row">
                        <div class="count-input-block">
                            <span class="widget-label">Qte</span>
                            <select class="form-control text-center"  id="qte" name="qte" style="background:#eee;border:solid 0px #000;border-radius:0%;">
                                @for ($i = 1; $i <= $produit->quantite; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            {{-- <input type="number" class="form-control text-center" value="1"> --}}
                        </div>
                        <div class="add-cart-btn">
                            <input type="hidden" name="code_produit" value="{{$produit->code}}">
                            <button type="submit" class="btn btn-outlined--primary">ajouter au panier</button>
                            {{-- <button type="submit" class="btn btn-primary">s'abonner</button> --}}
                        </div>

                    </div>
                    </form>
                    {{-- <div class="compare-wishlist-row mt--10">
                        <a href="" class="btn btn-outlined"><i class="fas fa-heart"></i>&nbsp; Ajouter aux favoris</a> --}}
                        {{-- <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                        aria-controls="tab-1" aria-selected="true">
                        DESCRIPTION
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                        aria-controls="tab-2" aria-selected="true">
                        REVIEWS (1)
                    </a>
                </li> --}}
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <h1 class="sr-only">Tab Article</h1>
                        <span style="font-size: 50px"> {!!$produit->description!!}</span>
                    </article>
                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                        <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                        <div class="review-comment mb--20">
                            <div class="avatar">
                                <img src="image/icon/author-logo.png" alt="">
                            </div>
                            <div class="text">
                                <div class="rating-block mb--15">
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline star_on"></span>
                                    <span class="ion-android-star-outline"></span>
                                    <span class="ion-android-star-outline"></span>
                                </div>
                                <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                                </h6>
                                <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
                                    quis mi.</p>
                            </div>
                        </div>
                        <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                        <div class="rating-row pt-2">
                            <p class="d-block">Your Rating</p>
                            <span class="rating-widget-block">
                                <input type="radio" name="star" id="star1">
                                <label for="star1"></label>
                                <input type="radio" name="star" id="star2">
                                <label for="star2"></label>
                                <input type="radio" name="star" id="star3">
                                <label for="star3"></label>
                                <input type="radio" name="star" id="star4">
                                <label for="star4"></label>
                                <input type="radio" name="star" id="star5">
                                <label for="star5"></label>
                            </span>
                            <form action="./" class="mt--15 site-form ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Comment</label>
                                            <textarea name="message" id="message" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="text" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="submit-btn">
                                            <a href="#" class="btn btn-black">Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--=================================
RELATED PRODUCTS BOOKS
===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>AUTRES ARTICLES</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 4,
        "dots":true
    }' data-slick-responsive='[
        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
        {"breakpoint":992, "settings": {"slidesToShow": 3} },
        {"breakpoint":768, "settings": {"slidesToShow": 2} },
        {"breakpoint":480, "settings": {"slidesToShow": 1} }
    ]'>
    @foreach (\App\Models\Produits::where('enabled',1)->where('quantite','>',0)->inRandomOrder()->take(6)->get() as $i=>$produit)

<div class="single-slide">
    <div class="product-card">

        <div class="product-card--body">
            @php $liens=$produit->image; $lien=$liens; $img="img.jpg";
                        if ($lien) { foreach($lien as $i){$img=$i;break; }}
                        if(file_exists(public_path().'/storage/'.$img)) $url=asset('storage/'.$img);
                        else $url=asset('images/articles/noavailable.png')

                        @endphp
                                        <div class="card-image" style="height:250px;background-image: url({{$url}});background-size:contain; background-position:center;background-repeat:no-repeat">


                <div class="hover-contents">

                    <div class="hover-btns">
                        <a href="cart.html" class="single-btn">
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                        {{-- <a href="wishlist.html" class="single-btn">
                            <i class="fas fa-heart"></i>
                        </a> --}}

                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-header mt-2 mb-0">

                <h3 class="text-truncate text-capitalize"><a href="{{route('produits.show',$produit->code)}}">{{$produit->nom}}</a>
                </h3>
            </div>
            <div class="price-block" style="margin-top: -20px">
                <span class="price">{{$produit->prix_vente}} fcfa</span>
                <!--<del class="price-old">{{$produit->prix_achat}} fcfa</del>-->
                <!--<span class="price-discount">20%</span>-->
            </div>

        </div>
    </div>
</div>

@endforeach
            </div>
        </div>
    </section>

</main>
@endsection

@section('extra-js')
    <script>
        (function ($) {
            "use strict"


            /////////////////////////////////////////

            // Product Main img Slick
            $('#product-main-img').slick({
                infinite: true,
                speed: 300,
                dots: false,
                arrows: true,
                fade: true,
                asNavFor: '#product-imgs',
            });

            // Product imgs Slick
            $('#product-imgs').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                centerMode: true,
                focusOnSelect: true,
                centerPadding: 0,
                vertical: true,
                asNavFor: '#product-main-img',
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        vertical: false,
                        arrows: false,
                        dots: true,
                    }
                },
                ]
            });
        })(jQuery);
    </script>
@endsection
