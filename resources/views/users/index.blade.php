@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Utilisateurs</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Créer un Utilisateur</a>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Genre</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Adresse 2</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Email</th>
                <th>Email Vérifié</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->address2 }}</td>
                    <td>{{ $user->zipcode }}</td>
                    <td>{{ $user->town }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
