@extends('layouts.app')

@section('title')
    Ajouter une réformation (Décharge structure)
@endsection


@section('content')
    <h1 class="mb-3">Ajouter une réformation (Décharge structure)</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('decharges_structure.store') }}">
        @csrf

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" required name="materiels[]" class="" required>
            </select>
        </div>

        <div class="mb-3">
            <label for="employe" class="form-label">Employé</label>
            <select id="employe" required name="employe" class="form-select" required>
                <option value="" selected>Sélectionner un employé</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->matricule}}">{{ $employe->nom. ' - '. $employe->structure?->designation }}</option>
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
                options: @json($materiels)
            });
        })
    </script>
@endsection
