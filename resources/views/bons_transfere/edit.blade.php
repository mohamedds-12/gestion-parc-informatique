@extends('layouts.app')

@section('title')
    Modifier le bon de transfére
@endsection


@section('content')
    <h1 class="mb-3">Modifier le bon de transfére</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('bons_transfere.update', $bon_transfere->num_bt)}}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="" class="form-label">N° bon de transfére</label>
            <input type="text" class="form-control" disabled readonly value="{{$bon_transfere->num_bt}}">
        </div>

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" required name="materiels[]" class="" required multiple>


            </select>
        </div>

        <div class="mb-3">
            <label for="ancienne_site" class="form-label">Ancienne site</label>
            <select class="form-select" required name="ancienne_site" id="">
                <option value="">Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{$site}}" @selected($site == $bon_transfere->ancienne_site)> {{ $site}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nouvelle_site" class="form-label">Nouvelle site</label>
            <select class="form-select" required name="nouvelle_site" id="">
                <option value="">Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{ $site }}" @selected($site == $bon_transfere->nouvelle_site)> {{ $site }}</option>
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
                items: @json($bon_transfere->materiels->map(fn($materiel) => $materiel->matricule)),
                options: @json($materiels),
            });
        })
    </script>
@endsection
