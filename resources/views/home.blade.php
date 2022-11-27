@extends('layouts.app')

@section('content')
@include('layouts.partial.slide')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/css-loader.css') }}">
@endsection
 <!-- Loader -->
 <div id="loader" class="loader loader-ball is-active" data-shadow></div>
<section class="mb--30 d-none d-lg-block">
	<h2 class="sr-only">Feature Section</h2>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-6 mt--30">
				<div class="feature-box h-100">
					<div class="icon">
						<i class="fas fa-shipping-fast" style="color: #FFC107"></i>
					</div>
					<div class="text ">
						<h5><strong>Livraison Rapide</strong></h5>
						{{-- <p> Orders over $500</p> --}}
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mt--30">
				<div class="feature-box h-100">
					<div class="icon">
						<i class="fas fa-redo-alt" style="color: #FFC107"></i>
					</div>
					<div class="text">
						<h5><strong>Retour Accepté</strong></h5>
						{{-- <p>100% money back</p> --}}
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mt--30">
				<div class="feature-box h-100">
					<div class="icon">
						<i class="fas fa-piggy-bank" style="color: #FFC107"></i>
					</div>
					<div class="text">
						<h5><strong>Paiement Cash</strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mt--30">
				<div class="feature-box h-100">
					<div class="icon">
						<i class="fas fa-life-ring" style="color: #FFC107"></i>
					</div>
					<div class="text">
						<h5><strong>Support 24/7</strong></h5>
						{{-- <p>Call us : + 0123.4567.89</p> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<br class="d-lg-none">

<section class="section-margin">
	<h1 class="sr-only">Promotion Section</h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="home-left-side text-center text-lg-left">
					<div class="single-block">
						<h3 class="home-sidebar-title style-2">
							Qui sommes nous ?

						</h3>
						<div>
							<p class="font-weight-normal" style="font-size:15px;text-align:left;">
								{{-- <a href="#" class="big-link" data-reveal-id="myModal">
									Fade and Pop
								</a> --}}
								<b>elivre</b> est un mouvement chrétien spécifique à la femme et à son
								édification. <br>
								L’objectif principal de ce mouvement, est <b>de rassembler</b> des femmes d’horizons
								diverses avec chacune sa particularité, son vécu, ses expériences et sa connaissance de
								la parole de Dieu ...
							</p>
							<center><a class="btn btn-outline-dark text-center" href="/apropos">voir plus</a></center>
						</div>
					</div>
                    @php

                        $offres = \DB::table('offres')->get();
// dd($offres);

                    @endphp
                    @if (count($offres)!=0)

					<div class="single-block text-center">
						<h3 class="home-sidebar-title style-2">
							Livre du mois
						</h3>
						<div class="product-slider countdown-single with-countdown sb-slick-slider product-border-reset"
							data-slick-setting='{
										"autoplay": true,
										"autoplaySpeed": 8000,
										"slidesToShow": 1,
										"dots":true
									}' data-slick-responsive='[
									{"breakpoint":1200, "settings": {"slidesToShow": 1} },
									{"breakpoint":992, "settings": {"slidesToShow": 2} },
									{"breakpoint":768, "settings": {"slidesToShow": 2} },
									{"breakpoint":575, "settings": {"slidesToShow": 1} },
									{"breakpoint":490, "settings": {"slidesToShow": 1} }
								]'>

							@foreach ($offres as $i=>$offre)
                                @php
                                    $produit = \DB::table('produits')->where("code",$offre->code_produit)->first();
                                    // dd(json_decode($produit->image))
                                @endphp
                                @if(intval($offre->du_mois==1))
							<div class="single-slide">
								<div class="product-card">

									<div class="product-card--body">
										@php $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg";
										if ($lien) {
										try{foreach($lien as $i){$img=$i;break; }}
										catch(exception $e){$lien=$liens;}}
										if(file_exists(public_path().'/storage/'.$img)) $url=asset('storage/'.$img);
										else $url=asset('images/articles/noavailable.png')

										@endphp
										<div class="card-image"
											style="height:250px;background-image: url({{$url}});background-size:contain; background-position:center;background-repeat:no-repeat">


											<div class="hover-contents">

												<div class="hover-btns">
													<form id="form" action="{{ route('cart.store') }}" method="POST"
														style="border-right:1px solid #eee">
														@csrf
														<input type="hidden" name="code_produit"
															value="{{$produit->code}}">

														<button type="submit" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</button>
													</form>
													{{-- <a href="wishlist.html" class="single-btn">
														<i class="fas fa-heart"></i>
													</a> --}}

													<a href="#" data-toggle="modal" data-target="#quickModal"
														class="single-btn">
														<i class="fas fa-eye"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="product-header mt-2 mb-0">

											<h3 class="text-truncate text-capitalize"><a
													href="{{route('produits.show',$produit->code)}}">{{$produit->nom}}</a>
											</h3>
										</div>
										<div class="price-block" style="margin-top: -20px">
										    @if(intval($offre->reduction)!=0)
											<span class="price">{{$produit->prix_achat - ($produit->prix_achat*$offre->reduction)/100 }} fcfa</span>
											<del class="price-old">{{$produit->prix_achat}} fcfa</del>
											<span class="price-discount">-{{$offre->reduction}}%</span>
											@else
											<span class="price">{{$produit->prix_vente }} fcfa</span>
											@endif
										</div>
										<div class="count-down-block">
											<div class="product-countdown" data-countdown="{{$offre->duree}}"></div>
										</div>
									</div>
								</div>
							</div>
@endif
							@endforeach

						</div>
					</div>
                    @endif

				</div>
			</div>
			<div class="col-lg-8">
				<div class="home-right-side">
					<div class="single-block">
						<div class="sb-custom-tab text-lg-left text-center">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
										aria-controls="shop" aria-selected="true">
										Nouveaux Livres
									</a>
									<span class="arrow-icon"></span>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab"
										aria-controls="men" aria-selected="true">
										livres en promo
									</a>
									<span class="arrow-icon"></span>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('produits.index')}}">
										Voir tous les livres
									</a>
									<span class="arrow-icon"></span>
								</li>
							</ul>
							<div class="tab-content space-db--30" id="myTabContent">

								<div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
									<div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
										data-slick-setting='{
							"autoplay": true,
							"autoplaySpeed": 8000,
							"slidesToShow": 3,
							"rows":2,
							"dots":true
							}' data-slick-responsive='[
					{"breakpoint":992, "settings": {"slidesToShow": 3} },
					{"breakpoint":768, "settings": {"slidesToShow": 2} },
					{"breakpoint":480, "settings": {"slidesToShow": 1} },
					{"breakpoint":320, "settings": {"slidesToShow": 1} }
				]'>


										@foreach ($best_produits as $i=>$offre)

										@if(count($best_produits)!=0)

                                            @php
                                                $produit = \DB::table('produits')->where("code",$offre->code_produit)->first();
                                            @endphp

										<div class="single-slide">
											<div class="product-card">

												<div class="product-card--body">
														@php $liens=$produit->image; $lien=json_decode($liens); $img="img.jpg";
										if ($lien) {
										try{foreach($lien as $i){$img=$i;break; }}
										catch(exception $e){$lien=$liens;}}
										if(file_exists(public_path().'/storage/'.$img)) $url=asset('storage/'.$img);
										else $url=asset('images/articles/noavailable.png')

										@endphp
													<div class="card-image"
														style="height:280px;background-image: url({{$url}});background-size:contain; background-position:center;background-repeat:no-repeat"
                                                        >


														{{-- <img src="image/products/product-11.jpg" alt=""> --}}
														<div class="hover-contents">
															{{-- <a href="{{route('produits.show',$produit->code)}}"
															class="hover-image">
															<img src="{{$url}}" alt="">
															</a> --}}
															<div class="hover-btns">
																<form id="form" action="{{ route('cart.store') }}"
																	method="POST" style="border-right:1px solid #eee">
																	@csrf
																	<input type="hidden" name="code_produit"
																		value="{{$produit->code}}">

																	<button type="submit" class="single-btn">
																		<i class="fas fa-shopping-basket"></i>
																	</button>
																</form>
																{{-- <a href="wishlist.html" class="single-btn">
																	<i class="fas fa-heart"></i>
																</a> --}}

																<a href="{{route('produits.show',$produit->code)}}"
																	class="single-btn">
																	<i class="fas fa-eye"></i>
																</a>
															</div>
														</div>
													</div>
													<div class="product-header mt-2 mb-0">

														<h3 class="text-truncate text-capitalize"><a
																href="{{route('produits.show',$produit->code)}}">{{$produit->nom}}</a>
														</h3>
													</div>
													@if(intval($offre->reduction)!=0)
											<span class="price">{{$produit->prix_achat - ($produit->prix_achat*$offre->reduction)/100 }} fcfa</span>
											<del class="price-old">{{$produit->prix_achat}} fcfa</del>
											<span class="price-discount">-{{$offre->reduction}}%</span>
											@else
											<span class="price">{{$produit->prix_vente }} fcfa</span>
											@endif
												</div>
											</div>
										</div>
										@endif
										@endforeach
									</div>
								</div>
								<div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
									<div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
										data-slick-setting='{
				"autoplay": true,
				"autoplaySpeed": 8000,
				"slidesToShow": 3,
				"rows":2,
				"dots":true
			}' data-slick-responsive='[
				{"breakpoint":992, "settings": {"slidesToShow": 3} },
				{"breakpoint":768, "settings": {"slidesToShow": 2} },
				{"breakpoint":480, "settings": {"slidesToShow": 1} },
				{"breakpoint":320, "settings": {"slidesToShow": 1} }
			]'>
										@foreach ($new_produits as $i=>$produit)

										<div class="single-slide">
											<div class="product-card">

												<div class="product-card--body">
													@php $liens=$produit->image; $lien=$liens; $img="img.jpg";
													if ($lien) { foreach($lien as $i){$img=$i;break; }}
													if(file_exists(public_path().'/storage/'.$img))
													$url=asset('storage/'.$img);
													else $url=asset('images/articles/noavailable.png')

													@endphp
													<div class="card-image"
														style="height:280px;background-image: url({{$url}});background-size:contain; background-position:center;background-repeat:no-repeat">


														{{-- <img src="images/products/product-12.jpg" alt="" height="170"> --}}
														{{-- <img src="{{asset('storage/'.$img)}}" alt=""> --}}
														{{-- <img src="images/products/product_placeholder_square_medium.jpg" data-src="{{asset('storage/'.$img)}}"
														alt=""> --}}



														{{-- <img src="image/products/product-12.jpg" alt=""> --}}
														<div class="hover-contents">
															{{-- <a href="{{route('produits.show',$produit->code)}}"
															class="hover-image">
															<img src="{{$url}}" alt="">
															</a> --}}
															<div class="hover-btns">
																<form id="form" action="{{ route('cart.store') }}"
																	method="POST" style="border-right:1px solid #eee">
																	@csrf
																	<input type="hidden" name="code_produit"
																		value="{{$produit->code}}">

																	<button type="submit" class="single-btn">
																		<i class="fas fa-shopping-basket"></i>
																	</button>
																</form>
																{{-- <a href="wishlist.html" class="single-btn">
																	<i class="fas fa-heart"></i>
																</a> --}}

																<a href="{{route('produits.show',$produit->code)}}"
																	class="single-btn">
																	<i class="fas fa-eye"></i>
																</a>
															</div>
														</div>
													</div>
													<div class="product-header mt-2 mb-0">

														<h3 class="text-truncate text-capitalize"><a
																href="{{route('produits.show',$produit->code)}}">{{$produit->nom}}</a>
														</h3>
													</div>
													<div class="price-block" style="margin-top: -20px">
														<span class="price">{{$produit->prix_vente}} fcfa</span>
														{{-- <del class="price-old">{{$produit->prix_achat}} fcfa</del>
														<span class="price-discount">20%</span> --}}
													</div>
												</div>
											</div>
										</div>

										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>

					{{-- <div class="single-block">
						<div class="row space-db--30">
							<div class="col-lg-8 mb--30">
								<a href="" class="promo-image promo-overlay">
									<img src="images/bg-images/promos.png" alt="">
								</a>
							</div>
							<div class="col-lg-4 mb--30">
								<a href="" class="promo-image promo-overlay">
									<img src="images/bg-images/solde.png" alt="">
								</a>
							</div>
						</div>
					</div> --}}

				</div>
			</div>
		</div>
	</div>



<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>

<script type="text/javascript" src="js/jquery.reveal.js"></script>
<style>
	.reveal-modal-bg {
		position: fixed;
		height: 100%;
		width: 100%;
		background: #000;
		background: rgba(0,0,0,.6);
		z-index: 100;
		display: none;
		top: 0;
		left: 0;
		}

	.reveal-modal {
		visibility: hidden;
		top: 100px;
		/* left: 50%; */
		left: 50%;
    transform: translate(-50%, 0);
		/* margin-left: -100px; */
		width: 40%;
		background: rgba(56, 56, 56, .4);
		/* opacity: 0.4; */
		position: absolute;
		z-index: 1001;
		padding: 30px 40px 34px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		-moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
		-webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
		-box-shadow: 0 0 10px rgba(0,0,0,.4);
		}

	.reveal-modal.small 		{ width: 200px; margin-left: -140px;}
	.reveal-modal.medium 		{ width: 400px; margin-left: -240px;}
	.reveal-modal.large 		{ width: 600px; margin-left: -340px;}
	.reveal-modal.xlarge 		{ width: 800px; margin-left: -440px;}

	/* .reveal-modal .close-reveal-modal {
		font-size: 22px;
		line-height: .5;
		position: absolute;
		top: 8px;
		right: 11px;
		color: #aaa;
		text-shadow: 0 -1px 1px rbga(0,0,0,.6);
		font-weight: bold;
		cursor: pointer;
		}  */

</style>
<div id="myModal" class="reveal-modal">





	<div class="parent-wrapper">
		<span class="close-btn fas fa-window-close close-reveal-modal" style="color:white"></span>
		<div class="subscribe-wrapper">
		  <h4>RECEVEZ UN EBOOK GRATUIT</h4>
		  <form action="">
		  <input type="email" name="email" class="subscribe-input" required placeholder="Votre e-mail">
		  <button class="submit-btn" type="submit">VALIDER</button>
		  </form>

		</div>
	  </div>
</div>
<style>
	.parent-wrapper {
  position: relative;
  width: 76%;
  height: 270px;
  margin: 40px auto 0;
  background-image: url('http://www.imgbase.info/images/safe-wallpapers/digital_art/1_miscellaneous_digital_art/41750_1_miscellaneous_digital_art_simple_dark_shapes.jpg');
  background-size: 100%;
  background-repeat: no-repeat;
  background-position-y: -600%;
  background-color: #000;
  border-radius: 4px;
  color: #FFF;
  box-shadow: 0px 0px 50px 5px rgba(0, 0, 0, 0.5);
}

.close-btn {
  margin: 15px;
  font-size: 15px;
  cursor: pointer;
  color: #FFF;
}


.subscribe-wrapper {
  position: absolute;
  left: -30px;
  right: -30px;
  height: 200px;
  padding: 30px;
  background-image: url('https://i.imgur.com/MRjF1PL.png?1');
  background-position-x: 272%;
  background-position-y: -1px;
  background-repeat: no-repeat;
  background-color: #FFF;
  border-radius: 4px;
  color: #333;
  box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
}

.subscribe-wrapper:after {
  position: absolute;
  content: "";
  right: -10px;
  bottom: 71px;
  width: 0;
  height: 0;
  border-left: 0px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #7149c7;
}

.subscribe-wrapper h4 {
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  letter-spacing: 3px;
  line-height: 28px;
}

.subscribe-wrapper input {
  position: absolute;
  bottom: 30px;
  border: none;
  border-bottom: 1px solid #d4d4d4;
  padding: 10px;
  width: 65%;
  background: transparent;
  transition: all .25s ease;
}

.subscribe-wrapper input:focus {
  outline: none;
  border-bottom: 1px solid #a77cf4;
}

.subscribe-wrapper .submit-btn {
  position: absolute;
  border-radius: 30px;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  background-color: #a77cf4;
  color: #FFF;
  padding: 12px 25px;
  display: inline-block;
  font-size: 12px;
  font-weight: bold;
  letter-spacing: 2px;
  right: -10px;
  bottom: 30px;
  cursor: pointer;
  transition: all .25s ease;
  box-shadow: -5px 6px 20px 0px rgba(51, 51, 51, 0.4);
}

.subscribe-wrapper .submit-btn:hover {
  background-color: #8e62dc;
}
@media only screen and (max-width: 800px) {
			.reveal-modal {
				width: 100%;
				/* left: 50%; */
		/* margin-left: -160px; */
			}
			/* .parent-wrapper {
  /* position: relative; */
  width: 100%;} */

		}
</style>
</section>

@endsection
