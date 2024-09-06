
@extends('layouts.app')

@section ('content')
    <h1>Catégories</h1>
    @foreach($categorie as $categorie)
        <h2>{{$categorie->name}} </h2>
        <a href="{{route('category.show', $category->id )}}" class="btn btn-info btn-sm">Voir les produits</a>
    @endforeach
@endsection
