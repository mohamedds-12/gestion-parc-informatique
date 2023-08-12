@extends('layouts.app')

@section('title')
    Modifier le bon d'entrée
@endsection


@section('content')
    <h1 class="mb-3">Modifier le bon d'entrée</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('bons_entre.update', $bon_entre->num_be)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="" class="form-label">N° bon d'entrée </label>
            <input type="text" class="form-control" disabled readonly value="{{$bon_entre->num_be}}">
        </div>

        <div class="mb-3">
            <label for="agent" class="form-label">Agents</label>
            <select class="form-select" required name="agent" id="">
                <option value="">Sélectionner un agent</option>
                @foreach ($agents as $agent)
                    <option value="{{$agent->matricule}}" @selected($agent->matricule == $bon_entre->matricule_agent)> {{ $agent->nom .' '. $agent->prenom}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employe" class="form-label">Employés</label>
            <select class="form-select" required name="employe" id="">
                <option value="">Sélectionner un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->matricule}}" @selected($employe->matricule == $bon_entre->matricule_employe)> {{ $employe->nom .' '. $employe->prenom}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materiel" class="form-label">Matériels</label>
            <select class="form-select" required name="materiel" id="">
                <option value="">Sélectionner un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{$materiel->matricule}}"  @selected($materiel->matricule == $bon_entre->matricule_materiel)> {{ $materiel->designation}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea name="observation" class="form-control" id="observation" cols="20" rows="5">{{ $bon_entre->observation }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
