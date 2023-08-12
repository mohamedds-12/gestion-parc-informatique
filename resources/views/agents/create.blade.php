@extends('layouts.app')

@section('title')
    Ajouter un agent
@endsection


@section('content')
    <h1 class="mb-3">Creér un agent</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('agents.store')}}">
        @csrf

        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" required value="{{old('matricule')}}">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required value="{{old('nom')}}">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required value="{{old('prenom')}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required value="{{old('password')}}">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirmation" required value="{{old('password_confirmation')}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
