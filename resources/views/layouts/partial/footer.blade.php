<footer class="site-footer">
    @php
    $numero = DB::table('settings')->where('key', 'contact_1')->first()->value;
    $email = DB::table('settings')->where('key', 'email')->first()->value;
    $facebook = DB::table('settings')->where('key', 'facebook_page')->first()->value;
    $youtube ="j"
@endphp
    <div class="container">
        <div class="row justify-content-between  section-padding">
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="brand-footer footer-title">
                        <img src="{{asset('images/logo.png')}}" height="100" alt="">
                    </div>
                    <div class="footer-contact">
                        {{-- <p><span class="label">Addresse:</span><span class="text">Abidjan, Côte d'Ivoire</span></p> --}}
                        <p><span class="label">Téléphone:</span><span class="text">{{$numero}}</span></p>
                        <p><span class="label">Email:</span><span class="text" style="font-size:15px;">{{$email}}</span></p>
                    </div>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Information</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{url('apropos')}}">A propos de nous</a></li>
                        <li><a href="{{url('conditions')}}">Condition générale d'utilisation</a></li>
                        <li><a href="{{url('confidentialite')}}">Politique de confidentialité</a></li>

                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Extras</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{url('mon-compte')}}">Mon compte</a></li>
                        <li><a href="{{url('produits')}}">Boutique</a></li>
                        <li><a href="{{url('contact')}}">Nous contacter</a></li>

                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-4 col-sm-6">
                <div class="footer-title">
                    <h3>SOCIAL</h3>
                </div>
                {{--
                <div class="newsletter-form mb--30">
                    <form action="./php/mail.php">
                        <input type="email" class="form-control" placeholder="Entrez votre adresse mail ici...">
                        <button class="btn btn--primary w-100">Souscrire</button>
                    </form>
                </div>
                --}}
                <div class="social-block">
                    {{-- <h3 class="title">STAY CONNECTED</h3> --}}
                    <ul class="social-list list-inline">
                        <li class="single-social facebook"><a href="{{ $facebook }}" target="_blank"><i class="ion ion-social-facebook"></i></a>
                        </li>
                        <li class="single-social whatsapp bg-dark"><a href="https://wa.me/225{{$numero}}?text=Hello elivre.com" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                        {{-- <li class="single-social google"><a href=""><i
                                    class="ion ion-social-googleplus-outline"></i></a></li> --}}
                        <li class="single-social youtube"><a href="{{ $youtube }}" target="_blank"><i class="ion ion-social-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            {{-- <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                vel magna volutpat, posuere eros</p> --}}
            <a href="#" class="payment-block">
                {{-- <img src="images/icon/payment.png" alt=""> --}}
            </a>
            <p class="copyright-text">Copyright © 2022 <a href="" class="author">elivre</a>. Tout droit reservé.
                <br>
                Design By <a href="http://sminth.atwebpages.com/" target="_blank" rel="noopener noreferrer" class="author">Sminth</a></p>
        </div>
    </div>
</footer>
