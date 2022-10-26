@extends('layouts.app')
@section('title','adresses')
@section('content')
<section class="section-content  bg padding-y border-top" >
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
        <div class="col-lg-8 ">
            <div class="card p-1">
                <p style="font-size: 20px;font-weight:bold"> Votre Adresse</p>
              <div class="card-body">
                <form class="col-lg-9" style="border: none" method="POST" action="{{route('client.updateadresse')}}">
                     @csrf
                        <div class="form-row">
                            <div class="col-lg form-group">
                                <label>Ville </label>
                                        <select name='ville' id="inputState" class="form-control ville">
                                            @foreach (App\Models\Villes::All() as $v)
                                            @if ($v->nom==$ville)
                                                <option selected="">{{$v->nom}}</option>
                                            @else
                                            <option> {{$v->nom}}</option>
                                            @endif
                                            @endforeach
                                        </select>    
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Commune </label>
                                        <select name="commune" id="inputState" class="form-control commune">
                                            @foreach (App\Models\Communes::All() as $c)
                                            @if ($c->nom==$commune)
                                                <option value="{{$c->code}}" selected="">{{$c->nom}}</option>
                                            @else
                                            <option value="{{$c->code}}"> {{$c->nom}}</option>
                                            @endif                                            
                                            @endforeach
                                        </select>    
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        
                        <div class="col- form-group">
                            <label>detail </label>
                            <textarea name="desc" class="form-control adresse" id="t1" maxlength="255" placeholder="" required>{{$adresse ?$adresse->description:""}}</textarea>
                        </div> <br>
                        <div class="form-group text-center" style="">
                            <button class="btn btn-success rounded-0" type="submit"> Enregistrer </button>
                        </div> 
                          
                    </form>
              </div>
            </div>
        </div>
        </div>
    </div>
</section>
@stop