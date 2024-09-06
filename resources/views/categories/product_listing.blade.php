@extends('layouts.app')

@section('content')
    <h1>Produits</h1>
    @foreach($category->produits as $product)
        <p>Nom : {{$product->nom}}</p>
        <p>Prix : {{$product->prix}}</p>
        <p>Quantité : {{$product->quantite}}</p>
        <p>Poids :{{$product->poid}}</p>
        <p>Description : {{$product->description}}</p>
    @endforeach

@endsection
