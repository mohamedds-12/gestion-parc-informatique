@extends('layouts.app')

@section('title')
    Modifier le bon de sortie
@endsection


@section('content')
    <h1 class="mb-3">Modifier le bon de sortie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('bons_sortie.update', $bon_sortie->num_bs)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="employe" class="form-label">Employés</label>
            <select class="form-select" name="employe" id="">
                <option value="">Sélectionner un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->matricule}}" @selected($employe->matricule == $bon_sortie->matricule_employe)> {{ $employe->nom .' '. $employe->prenom}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materiel" class="form-label">Matériels</label>
            <select class="form-select" name="materiel" id="">
                <option value="">Sélectionner un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{$materiel->matricule}}"  @selected($materiel->matricule == $bon_sortie->matricule_materiel)> {{ $materiel->designation}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea name="observation" class="form-control" id="observation" cols="20" rows="5">{{ $bon_sortie->observation }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
