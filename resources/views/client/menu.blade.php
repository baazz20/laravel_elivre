<div id="menu-account" class="d-none d-lg-block">
    <div class="list-group">
        <a href="{{url('/mon-compte')}}" class="list-group-item list-group-item-action">
            votre compte martheetmarie
        </a>
        <a href="{{url('/mes-commandes')}}" class="list-group-item list-group-item-action">
            vos commandes
        </a>
        <a href="{{route('wishlist.index')}}" class="list-group-item list-group-item-action">
            vos favoris
        </a>
        <a href="{{ url('/info') }}" class="list-group-item list-group-item-action">
            informations personnelles
        </a>
        <!--
        <a class="list-group-item" href="{{url('/adresse')}}">
           Adresses
        </a>
        -->
        <a class="list-group-item" href="{{url('/changer-motdepasse')}}">
            modifier votre mot de passe
        </a>
    </div>
</div>
