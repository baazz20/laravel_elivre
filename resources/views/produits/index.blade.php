@extends('layouts.app')
@section('title','nos produits')
@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site </h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}">Accueil</a></li>
                    @if(!isset($categorie)) <li class="breadcrumb-item active"><a href="{{URL('/produits')}}">Boutique</a></li>
                    @else
                    @foreach ($lien as  $item=>$i)

                        @if ($item==$categorie->nom)
                            <li class="breadcrumb-item active"><a

                                        href="{{route($i,['categorie'=>$categorie->code])}}">{{$item}}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item"><a href="#">{{$item}}</a></li>
                        @endif
                    @endforeach
                    @endif
                    {{-- <li class="breadcrumb-item active">Shop</li> --}}
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="shop-toolbar mb--30">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <!-- Product View Mode -->
                    <div class="product-view-mode">
                        <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                        <a href="#" class="sorting-btn" data-target="grid-four">
                            <span class="grid-four-icon">
                                <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                            </span>
                        </a>
                        <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        {{count($produits)}} produits trouvés
                    </span>
                </div>

                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>filtre sur le prix:</span>
                        @php $code_categorie=request()->categorie; @endphp
                        <form style="border: none" action="{{route('produits.index')}}" method="GET">
                            <select onchange='this.form.submit()' name='trie'
                                class="form-control nice-select sort-select mr-0">
                                <option value="0" selected="selected">Aucun filtre</option>
                                <option value="1">prix croissant</option>
                                <option value="2">prix decroissant</option>
                            </select>
                            <input type="hidden" name="categorie" value="{{$code_categorie}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-toolbar d-none">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <!-- Product View Mode -->
                    <div class="product-view-mode">
                        <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                        <a href="#" class="sorting-btn" data-target="grid-four">
                            <span class="grid-four-icon">
                                <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                            </span>
                        </a>
                        <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        {{count($produits)}} produits trouvés
                    </span>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">

                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>filtre sur le prix:</span>
                        @php $code_categorie=request()->categorie; @endphp
                        <form style="border: none" action="{{route('produits.index')}}" method="GET">
                            <select onchange='this.form.submit()' name='trie'
                                class="form-control nice-select sort-select mr-0">

                            </select>
                            <input type="hidden" name="categorie" value="{{$code_categorie}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
            @foreach ($produits as $produit)
            @php $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg";
            if ($lien) { foreach($lien as $i){$img=$i;break;} }
            if(file_exists(public_path().'/storage/'.$img)) $url=asset('storage/'.$img);
            else $url=asset('images/articles/noavailable.png')

            @endphp
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">


                        <div class="product-card--body">

                            <div class="card-image"
                                style="height:290px;background-image: url({{$url}});background-size:contain; background-position:center;background-repeat:no-repeat">
                                {{-- <img src="{{$url}}" alt=""> --}}
                                <div class="hover-contents">
                                    <a href="{{route('produits.show',$produit->code)}}" class="hover-image">
												<img src="{{$url}}" alt="" style="width: 60%">
                                    </a>
                                    <div class="hover-btns">
                                        <form  id="form" action="{{ route('cart.store') }}" method="POST" style="border-right:1px solid #eee">
                                            @csrf
                                            <input type="hidden" name="code_produit" value="{{$produit->code}}">

                                            <button type="submit" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                            </button>
                                        </form>

                                        {{-- <a href="#" class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a> --}}

                                        </a>
                                        <a href="{{route('produits.show',$produit->code)}}" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-header mt-2 mb-0">

                                <h3 class="text-truncate text-capitalize word-limit"><a href="{{route('produits.show',$produit->code)}}"> {{$produit->nom}}</a></h3>
                            </div>
                            <div class="price-block " style="margin-top: -20px">
                                <span class="price">{{$produit->prix_vente}} fcfa</span>

                                @php
                                    $offre = \DB::table('offres')->where('code_produit',$produit->code)->first();

                                @endphp
                                @if ($offre && intval($offre->reduction)!=0)

                                <del class="price-old">{{$produit->prix_achat}} fcfa</del>
                                <span class="price-discount">{{$offre->reduction}}%</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="product-list-content">
                        <div class="card-image"
                        style="height:280px;width:200px;background-image: url({{$url}});background-size:cover; background-position:center;background-repeat:no-repeat">

                            {{-- <img src="image/products/product-3.jpg" alt=""> --}}
                        </div>
                        <div class="product-card--body ml-lg-5">
                            {{-- <div class="product-header">

                                <h3><a href="{{route('produits.show',$produit->code)}}"> {{$produit->nom}}</a></h3>
                            </div> --}}
                            <article>
                                {{-- <h2 class="sr-only">Card List Article</h2> --}}
                                {{-- <p class="text-truncate" style="max-lines: 3; height:10px">{!!$produit->description!!}</p> --}}
                            </article>
                            <div class="product-header mt-2 mb-0">

                                <h3 class="text-truncate text-capitalize word-limit"><a href="{{route('produits.show',$produit->code)}}"> {{$produit->nom}}</a></h3>
                            </div>
                            <div class="price-block " style="margin-top: -20px">
                                <span class="price">{{$produit->prix_vente}} fcfa</span>
                                {{-- <del class="price-old">{{$produit->prix_achat}} fcfa</del> --}}
                                {{-- <span class="price-discount">20%</span> --}}
                            </div>
                            {{-- <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div> --}}
                            <div class="btn-block ">
                                <a href="" class="btn btn-outlined">Ajouter au panier</a>
                                {{-- <a href="" class="btn btn-outlined"><i class="fas fa-heart"></i> Ajouter au favoris</a> --}}
                               {{-- <a href="#" class="card-link"><i class="fas fa-random"></i> </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <!-- Pagination Block -->
        {{$produits->links()}}


    </div>
</main>
@endsection

@section('extra-js')
<script>
    const checkbox = $(".categorie");

        checkbox.change(function (event) {
            var checkbox = event.target;
            // if (checkbox.checked) {
            // alert(checkbox.name);
            // } else {
            //     alert('no');
            // }
            // form = event.target.parentNode;
            // alert(form);
            // node = document.createElement("input");
            // node.name  = "categorie";
            // node.type  = "hidden";
            // node.value = checkbox.name;
            // form.appendChild(node.cloneNode());
            $('#form1').submit();
        });
</script>
@endsection
