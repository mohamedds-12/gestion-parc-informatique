@extends('layouts.app')

@section('title')
    Modifier le fournisseur
@endsection


@section('content')
    <h1>Modifier le fournisseur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('fournisseurs.update', $fournisseur->num_fournisseur)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="num_fournisseur" class="form-label">N° Fournisseur</label>
            <input disabled readonly type="text" class="form-control" id="num_fournisseur" value="{{ $fournisseur->num_fournisseur }}">
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" required id="nom" value="{{ $fournisseur->nom }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
