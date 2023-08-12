@extends('layouts.app')

@section('title')
    Ajouter une réparation (Décharge fournisseur)
@endsection


@section('content')
    <h1 class="mb-3">Ajouter une réparation (Décharge fournisseur)</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('decharges_fournisseur.store') }}">
        @csrf

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" required name="materiels[]" class="" required>


            </select>
        </div>

        <div class="mb-3">
            <label for="fournisseur" class="form-label">Fournisseur</label>
            <select id="fournisseur" required name="fournisseur" class="form-select" required>
                <option value="" disabled selected> Choisir un fournisseur</option>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->num_fournisseur }}" @selected(old('fournisseur') == $fournisseur->num_fournisseur)>{{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="probleme" class="form-label">Probléme</label>
            <textarea required name="probleme" class="form-control" id="probleme" cols="20" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea name="observation" class="form-control" id="observation" cols="20" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        $(() => {
            $('#materiels').selectize({
                plugins: ["restore_on_backspace", "clear_button"],
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
