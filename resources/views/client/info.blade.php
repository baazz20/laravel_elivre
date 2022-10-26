@extends('layouts.app')

@section('title')
    modifier les informations personnelles
@endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
            <div class="col-lg-8">
                <form method="POST" action="{{route('client.updateinfo')}}" style="border: none">

                    @csrf
                    <h5 class="text-uppercase">vos informations personnelles</h5>
                    <div class="col-12 col-lg-6 mt-3">
                        <label for="nom">nom</label>
                        <input class="w-100" name="nom" type="text" value="{{Auth::user()->nom}}" required>
                    </div>

                    <div class="col-12 col-lg-6 mt-2">
                        <label for="prenoms">Prénom</label>
                        <input class="w-100" name="prenom" type="text" value="{{Auth::user()->prenom}}" required>
                    </div>

                    <div class="col-12 col-lg-6 mt-2">
                        <label for="prenoms">Téléphone</label>
                        <input class="w-100" name="telephone" type="text" value="{{Auth::user()->telephone}}" required>
                    </div>

                    <div class="col-12 col-lg-6 mt-3">
                        <button class="btn btn-success rounded-0">modifier les informations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection