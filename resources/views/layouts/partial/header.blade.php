<div class="site-header header-4 mb--20 d-none d-lg-block">
    @php
        $numero = DB::table('settings')->where('key', 'contact_2')->first()->value;
        $whatsapp = DB::table('settings')->where('key', 'contact_1')->first()->value;
        $email = DB::table('settings')->where('key', 'email')->first()->value;
        $facebook = DB::table('settings')->where('key', 'facebook_page')->first()->value;
    @endphp
        <div class="header-middle pt--10 pb--10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <a href="{{route('accueil')}}" class="site-brand">
                            <img src="{{asset('images/logo.png')}}" alt="" height="60">
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <div class="header-search-block">
                            <form class="input" action="{{route('produits.recherche')}}" method="get">
                            <input name="q" type="text" placeholder="Entrez votre recherche">
                            <button style="background-color: #00A19B">Rechercher</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="main-navigation flex-lg-right">
                            <div class="cart-widget">
                                <div class="login-block">
                                    <a href="{{route('login.index')}}" class="font-weight-bold"><i class="fas fa-user-circle" style="font-size: 25px"></i></a>
                                </div>
                                <div class="">
                                    <a href="{{route('cart.index')}}" class="font-weight-bold cart-link link-icon"><i class="ion-bag" style="font-size: 25px"></i><span class="" style="font-size: 12px;
                                        background: #00A19B; color: #fff;  padding: 0 5px; border-radius: 50%;vertical-align: top;" >{{Cart::count()}}</span></a>

                                    {{-- <div class="cart-total">
                                        <span class="text-number">
                                            {{Cart::count()}}
                                        </span>

                                    </div> --}}
                                    {{-- <div class="cart-dropdown-block">
                                        <div class=" single-cart-block ">
                                            <div class="cart-product">
                                                <a href="product-details.html" class="image">
                                                    <img src="image/products/cart-product-1.jpg" alt="">
                                                </a>
                                                <div class="content">
                                                    <h3 class="title"><a href="product-details.html">Kodak PIXPRO
                                                            Astro Zoom AZ421 16 MP</a>
                                                    </h3>
                                                    <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                    <button class="cross-btn"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" single-cart-block ">
                                            <div class="btn-block">
                                                <a href="cart.html" class="btn">Voir panier <i
                                                        class="fas fa-chevron-right"></i></a>
                                                <a href="checkout.html" class="btn btn--primary">Payement <i
                                                        class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom  @if (!Request()->is('/')){{"bg-primary"}} @endif">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">

                        <nav class="category-nav  @if (!Request()->is('/')){{"white-nav"}} @endif @if (Request()->is('/')){{"show"}} {{'primary-nav'}} @endif" >
                            <div>
                                <a href="javascript:void(0)" class="category-trigger"><i
                                        class="fa fa-bars"></i>
                                    CATEGORIES</a>
                                <ul class="category-menu" style="border:2px solid #EE008C">


                                    @foreach (DB::table('categories')->get() as $item)
                                    <li class="cat-item"><a href="{{url('/produits?categorie='.$item->code)}}">{{$item->nom}}</a></li>

                                    {{-- <li ><a href="#" style="text-transform: uppercase;"> <i class="fa fa-book"></i> {{$item->nom}}</a></li> --}}
                                    @endforeach


                                    {{-- <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                            Categories</a></li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header-phone @if (!Request()->is('/')){{"color-white"}} @endif">
                            <div class="icon">
                                <i class="fas fa-headphones-alt"></i>
                            </div>
                            <div class="text">
                                <p>Support 24h/7j</p>
                                <p class="font-weight-bold number"> {{$numero}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right @if (!Request()->is('/')){{"main-menu--white"}} @endif   li-last-0">
                                <li class="menu-item">
                                    <a href="{{route('accueil')}}"><strong>Accueil</strong></a>
                                </li>
                                <!-- Shop -->
                                <li class="menu-item">
                                    <a href="{{route('produits.index')}}"><strong>Boutique</strong></a>
                                </li>

                                <li class="menu-item">
                                    <a href="#"><strong>Abonnement</strong></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-mobile-menu">
        <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
            <div class="container">
                <div class="row align-items-sm-end align-items-center">
                    <div class="col-md-4 col-7">
                        <a href="{{route('accueil')}}" class="site-brand">
                            <img src="{{asset('images/logo.png')}}" alt="" height="60">
                        </a>
                    </div>
                    <div class="col-md-5 order-3 order-md-2">
                        <nav class="category-nav   ">
                            <div>
                                <a href="javascript:void(0)" class="category-trigger"><i
                                        class="fa fa-bars"></i>CATEGORIES</a>
                                <ul class="category-menu">
                                    @foreach (DB::table('categories')->get() as $item)
                                    <li class="cat-item"><a href="{{url('/produits?categorie='.$item->code)}}">{{$item->nom}}</a></li>

                                    {{-- <li ><a href="#" style="text-transform: uppercase;"> <i class="fa fa-book"></i> {{$item->nom}}</a></li> --}}
                                    @endforeach

                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-3 col-5  order-md-3 text-right">
                        <div class="mobile-header-btns header-top-widget">
                            <ul class="header-links">
                                <li class="sin-link">
                                    <a href="{{route('cart.index')}}" class="cart-link link-icon"><i class="ion-bag"></i><span class="" style="font-size: 12px;
                                        background: #00A19B; color: #fff;  padding: 0 5px; border-radius: 50%;vertical-align: top;">{{Cart::count()}}</span></a>
                                </li>
                                <li class="sin-link">
                                    <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                            class="ion-navicon"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Off Canvas Navigation Start-->
        <aside class="off-canvas-wrapper">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>
            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box offcanvas">
                    <form class="input" action="{{route('produits.recherche')}}" method="get">
                        <input name="q" type="text" placeholder="Rechercher içi">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu main-mobile-menu">
                            <li><a href="{{route('accueil')}}"><strong>Accueil</strong></a> </li>
                            <li> <a href="{{route('produits.index')}}"><strong>Boutique</strong></a> </li>

                            <li>
                                <a href="{{url('/apropos')}}"><strong>Qui sommes nous ?</strong></a>
                            </li>
                            <li><a href="#"><strong>Abonnement</strong></a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu menu-block-2">
                        @if (Auth()->user())
                        <a href="{{URL('/mon-compte')}}">Mon Compte </a>
                        @else
                        <a href="{{URL('/login')}}"><strong>Mon Compte</strong></a>
                        @endif

                    </ul>
                </nav>
                <div class="off-canvas-bottom">
                    <div class="contact-list mb--10">
                        <a href="tel://{{$numero}}" class="sin-contact"><i class="fas fa-mobile-alt"></i>{{$numero}}</a>
                        <a href="mailto:{{$email}}" class="sin-contact"><i class="fas fa-envelope"></i>{{$email}}</a>
                    </div>
                    <div class="off-canvas-social">
                        <a href="{{$facebook}}" target="_blank" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/225{{$whatsapp}}?text=Hello Martheetmarie.com" target="_blank" class="single-icon"><i class="fab fa-whatsapp"></i></a>

                        {{-- <a href="{{$instagram}}" class="single-icon"><i class="fab fa-twitter"></i></a> --}}

                        {{-- <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a> --}}

                        {{-- <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a> --}}
                    </div>
                </div>
            </div>
        </aside>
        <!--Off Canvas Navigation End-->
    </div>
    <div class="sticky-init fixed-header common-sticky">
        <div class="container d-none d-lg-block">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <a href="{{route('accueil')}}" class="site-brand">
                        <img src="{{asset('images/logo.png')}}" alt="" height="60">
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item">
                                <a href="{{route('accueil')}}"><strong>Accueil</strong></a>
                            </li>
                            <!-- Shop -->
                            <li class="menu-item">
                                <a href="{{route('produits.index')}}">Boutique</a>
                            </li>

                            <li class="menu-item">
                                <a href="#">Abonnement</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
