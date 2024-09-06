@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier Utilisateur</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
            </div>

            <div class="form-group">
                <label for="name">Prénom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>

            <div class="form-group">
                <label for="address2">Complément d'adresse</label>
                <input type="text" class="form-control" id="address2" name="address2" value="{{ $user->address2 }}">
            </div>

            <div class="form-group">
                <label for="zipcode">Code Postal</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $user->zipcode }}">
            </div>

            <div class="form-group">
                <label for="town">Ville</label>
                <input type="text" class="form-control" id="town" name="town" value="{{ $user->town }}">
            </div>

            <div class="form-group">
                <label for="country">Pays</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <!-- Ajoutez d'autres champs de formulaire pour les autres informations de l'utilisateur -->

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
