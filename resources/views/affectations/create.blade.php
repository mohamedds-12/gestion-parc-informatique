@extends('layouts.app')

@section('title')
    Ajouter une affectation
@endsection


@section('content')
    <h1 class="mb-3">Ajouter une affectation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('affectations.store')}}">
        @csrf

        <div class="mb-3">
            <label for="employe" class="form-label">Employé</label>
            <select id="employe" name="employe" class="form-select" required>
                <option value="" disabled selected> Choisir un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{ $employe->matricule }}" @selected(old('employe') == $employe->matricule)>{{ $employe->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materiel" class="form-label">Matériel</label>
            <select id="materiel" name="materiel" class="form-select" required>
                <option value="" disabled selected> Choisir un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{ $materiel->matricule }}" @selected(old('materiel') == $materiel->matricule)>{{ $materiel->designation }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
