@extends('layouts.app')

@section('title')
    Modifier la réformation (Décharge structure)
@endsection


@section('content')
    <h1 class="mb-3">Modifier la réformation (Décharge structure)</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('decharges_structure.update', $decharge_structure->code_decharge) }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="materiels" class="form-label">Code décharge</label>
            <input type="text" class="form-control" disabled readonly value="{{$decharge_structure->code_decharge}}">
        </div>

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" name="materiels[]" class="" required>
            </select>
        </div>

        <div class="mb-3">
            <label for="employe" class="form-label">Employé</label>
            <select id="employe" name="employe" class="form-select" required>
                <option value="" selected>Sélectionner un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->matricule}}" @selected($employe->matricule == $decharge_structure->employe->matricule)>{{ $employe->nom. ' - '. $employe->structure->designation }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        $(() => {
            $('#materiels').selectize({
                plugins: ["restore_on_backspace", "remove_button"],
                delimiter: " - ",
                persist: false,
                maxItems: null,
                valueField: "matricule",
                labelField: "designation",
                searchField: ["designation"],
                options: @json($materiels),
                items: @json($decharge_structure->materiels->map(fn($materiel) => $materiel->matricule)),
            });
        })
    </script>
@endsection
