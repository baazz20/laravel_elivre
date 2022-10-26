@extends('layouts.app')

@section('title')
    modifier mon mot de passe
@endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
            <div class="col-lg-8">
                <form method="POST" action="{{route('client.updatepassword')}}">
                    @csrf
                    <h5 class="text-uppercase">Modifier votre mot de passe</h5>
                    <div class="col-12 col-lg-6 mt-3">
                        <label for="nom">Ancien mot de passe</label>
                        <input class="w-100" name="motdepasse" type="password" required>
                    </div>

                    <div class="col-12 col-lg-6 mt-2">
                        <label for="prenoms">Nouveau mot de passe</label>
                        <input class="w-100" name="nouveau_motdepasse" type="password" required>
                    </div>

                    <div class="col-12 col-lg-6 mt-3">
                        <button class="btn btn-success rounded-0">modifier le mot de passe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection