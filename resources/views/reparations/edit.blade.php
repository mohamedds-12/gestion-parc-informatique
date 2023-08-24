@extends('layouts.app')

@section('title')
    Modifier la réparation
@endsection


@section('content')
    <h1 class="mb-3">Modifier la réparation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('decharges_fournisseur.update', $decharge_fournisseur->code_decharge)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="materiels" class="form-label">Code décharge</label>
            <input type="text" class="form-control" disabled readonly value="{{$decharge_fournisseur->code_decharge}}">
        </div>

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" required name="materiels[]" class="" required multiple>


            </select>
        </div>

        <div class="mb-3">
            <label for="fournisseur" class="form-label">Fournisseur</label>
            <select id="fournisseur" required name="fournisseur" class="form-select" required>
                <option value="" disabled selected> Choisir un fournisseur</option>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->num_fournisseur }}" @if($decharge_fournisseur->fournisseur?->num_fournisseur == $fournisseur->num_fournisseur)  selected @endif>{{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="probleme" class="form-label">Probléme</label>
            <textarea required name="probleme" class="form-control" id="probleme" cols="20" rows="5">{{ $decharge_fournisseur->probleme }}</textarea>
        </div>

        <div class="mb-3">
            <label for="observation" class="form-label">Observation</label>
            <textarea name="observation" class="form-control" id="observation" cols="20" rows="5">{{$decharge_fournisseur->observation}}</textarea>
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
                items: @json($decharge_fournisseur->materiels->map(fn($materiel) => $materiel->matricule)),
                options: @json($materiels),
            });
        })
    </script>
@endsection
