@extends('layouts.app')

@section('content')
    <title>Modification de catégorie</title>
    <h1>Modification de catégorie</h1>
    <form action="{{ route('category.update',$category->id)}}" method="post">
        <input type="name" name="name" placeholder="nom de la catégorie">
        {{ csrf_field() }}
        <input type="submit" value="Enregistrer">
    </form>
    <a href="{{route('category.delete')}}" class="btn btn-info btn-sm">Supprimer la catégorie</a>

@endsection
