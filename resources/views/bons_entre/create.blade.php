@extends('layouts.app')

@section('title')
    Creér un bon d'entrée
@endsection


@section('content')
    <h1 class="mb-3">Creér un bon d'entrée</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('bons_entre.store')}}">
        @csrf

        <div class="mb-3">
            <label for="agent" class="form-label">Agent</label>
            <select class="form-select" required name="agent" id="">
                <option value="">Sélectionner un agent</option>
                @foreach ($agents as $agent)
                    <option value="{{$agent->matricule}}"> {{ $agent->nom .' '. $agent->prenom}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="employe" class="form-label">Employé</label>
            <select class="form-select" required name="employe" id="">
                <option value="">Sélectionner un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->matricule}}"> {{ $employe->nom .' '. $employe->prenom}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materiel" class="form-label">Matériel</label>
            <select class="form-select" required name="materiel" id="">
                <option value="">Sélectionner un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{$materiel->matricule}}"> {{ $materiel->designation}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea name="observation" class="form-control" id="observation" cols="20" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
