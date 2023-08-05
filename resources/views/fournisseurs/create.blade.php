@extends('layouts.app')

@section('title')
    Ajouter un fournisseur
@endsection


@section('content')
    <h1 class="mb-3">Ajouter un fournisseur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('fournisseurs.store')}}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
