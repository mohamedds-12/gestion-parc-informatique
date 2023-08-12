@extends('layouts.app')

@section('title')
    Creér un bon de transfere
@endsection


@section('content')
    <h1 class="mb-3">Creér un bon de transfere</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('bons_transfere.store')}}">
        @csrf

        <div class="mb-3">
            <label for="materiels" class="form-label">Matériels</label>
            <select id="materiels" name="materiels[]" class="" required>


            </select>
        </div>

        <div class="mb-3">
            <label for="ancienne_site" class="form-label">Ancienne site</label>
            <select class="form-select" name="ancienne_site" id="">
                <option value="">Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{$site}}"> {{ $site}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nouvelle_site" class="form-label">Nouvelle site</label>
            <select class="form-select" name="nouvelle_site" id="">
                <option value="">Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{ $site }}"> {{ $site }}</option>
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
