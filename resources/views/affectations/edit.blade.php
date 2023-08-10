@extends('layouts.app')

@section('title')
    Modifier l'affectation
@endsection


@section('content')
    <h1>Modifier l'affectation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('affectations.update', $affectation->code_affectation)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="code_affectation" class="form-label">Code d'affectation</label>
            <input disabled readonly type="text" class="form-control" id="code_affectation" name="" value="{{$affectation->code_affectation}}">
        </div>

        <div class="mb-3">
            <label for="employe" class="form-label">Employé</label>
            <select id="employe" name="employe" class="form-select" required>
                <option value="" disabled> Choisir un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{ $employe->matricule }}"
                        @selected($employe->matricule == $affectation->employe->matricule)
                        >{{ $employe->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materiel" class="form-label">Matériel</label>
            <select id="materiel" name="materiel" class="form-select" required>
                <option value="" disabled> Choisir un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{ $materiel->matricule }}"
                        @selected($materiel->matricule == $affectation->materiel->matricule)
                        >{{ $materiel->designation }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
