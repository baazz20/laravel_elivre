@extends('layouts.app')

@section('title')
    vos commandes
@endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3">
                <!-- inclure la page menu.blade.php -->
                @include('client.menu')
            </div>
            <div class="col-lg-8">
                <div class="section">
                    <h5 class="text-uppercase">Historique des achats </h5>
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-dark">
                                    <th scope="col">N° commande</th>
                                    <th scope="col">Nombre d'article</th>
                                    
                                    <td scope="col">Total</td>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($commandes) --}}
                                @if(isset($commandes) && count($commandes)>0)
                                    @foreach ($commandes as $cmd)
                                        <tr>
                                            <td data-label="N°">{{$cmd->id}}</td>
                                            <td data-label="Nombre d'article">{{$cmd->quantite}}</td>
                                            <td data-label="Total">{{$cmd->montant}}</td>
                                            <td data-label="Date">{{$cmd->created_at}}</td>
                                            <td data-label=""><a href="{{route('client.commande.details',"$cmd->id")}}"><i class="fas fa-edit">detail</i></a></td>
                                            
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                {{ $commandes->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection