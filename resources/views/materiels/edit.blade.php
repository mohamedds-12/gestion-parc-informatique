@extends('layouts.app')

@section('title')
    Modifier le matériel
@endsection


@section('content')
    <h1>Modifier le matériel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('materiels.update', $materiel->matricule)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input disabled readonly type="text" class="form-control" id="matricule" value="{{ $materiel->matricule }}">
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ $materiel->designation }}">
        </div>
        <div class="mb-3">
            <label for="modele" class="form-label">Modéle</label>
            <input type="text" class="form-control" id="modele" name="modele" value="{{ $materiel->modele }}">
        </div>
        <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text" class="form-control" id="reference" name="reference" value="{{ $materiel->reference }}">
        </div>
        <div class="mb-3">
            <label for="num_serie" class="form-label">N° Série</label>
            <input type="text" class="form-control" id="num_serie" name="num_serie" value="{{ $materiel->num_serie }}">
        </div>
        <div class="mb-3">
            <label for="code_immo" class="form-label">Code IMMO</label>
            <input type="text" class="form-control" id="code_immo" name="code_immo" value="{{ $materiel->code_immo }}">
        </div>




        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection