<table class='table order-details-table'>
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                               
                                        @foreach($articles as $article)
@php $produit=\DB::table('produits')->where('code',$article->code_prod)->first() @endphp
                                            <tr>
                                            <td><a href='{{route('produits.show',$produit->code)}}' class="text-truncate text-capitalize word-limit" style="max-width:250px">{{$produit->nom}}</a>
                                                <strong>× {{$article->quantite}}</strong></td>
                                            <td><span>{{$article->prix_vente}}</span></td>
                                        </tr>
                                        
                                        @endforeach
                                        </tbody>
                                        @php
                                        $livraison = $commande->prix_livraison??0;
                                        @endphp
                                        <tfoot>
                                            <tr>
                                                <th>Sous total:</th>
                                                <td><span>{{$commande->montant-$livraison}}</span></td>
                                            </tr>
                                            @if($livraison!=0)
                                            <tr>
                                                <th>Prix Livraison:</th>
                                                <td>{{$livraison}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Total:</th>
                                                <td><span>{{$commande->montant}}</span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
