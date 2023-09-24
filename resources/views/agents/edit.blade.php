@extends('layouts.app')

@section('title')
    Modifier un intervenant
@endsection


@section('content')
    <h1 class="mb-3">Modifier un intervenant</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('agents.update', ['matricule' => $agent->matricule])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input disabled readonly type="text" class="form-control" id="matricule" required name="matricule" value="{{$agent->matricule}}">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" required name="nom" value="{{$agent->nom}}">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" required name="prenom" value="{{$agent->prenom}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" required name="email" value="{{$agent->email}}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="password" required name="password" value="">
            <div class="form-text">Optional</div>
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmer mot de passe</label>
            <input type="text" class="form-control" id="password_confirm" required name="password_confirmation" value="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
