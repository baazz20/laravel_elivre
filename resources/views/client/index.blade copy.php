@extends('layouts.app')
@extends('layouts.app')

@section('title','mon compte')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
            <div class="col-lg-8">
                <div class="section">
                    <h5 class="text-uppercase">Votre compte</h5>
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="card col-11 col-lg-5 mb-4 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title">INFORMATIONS PERSONNELLES</h5>
                                <span class="font-weight-bold"> {{Auth::user()->nom.' '.Auth::user()->prenom}}</span>
                                <br>
                                <span>TEL : {{ Auth::user()->telephone }} </span> <br>
                                <span>{{Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection