@extends('layouts.app')

@section('content')
    <title>Création de catégorie</title>
    <h1>Création de catégorie</h1>
    <form action="{{ route('category.store') }}" method="post">
        <input type="name" name="name" placeholder="nom de la catégorie">
        {{ csrf_field() }}
        <input type="submit" value="Enregistrer">
    </form>

@endsection
