@extends('layouts.app')

@section('title')
    Creér un matériel
@endsection


@section('content')
    <h1 class="mb-3">Creér un matériel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('materiels.store')}}">
        @csrf

        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" required name="designation" value="{{old('designation')}}">
        </div>
        <div class="mb-3">
            <label for="modele" class="form-label">Modéle</label>
            <input type="text" class="form-control" id="modele" required name="modele" value="{{old('modele')}}">
        </div>
        <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text" class="form-control" id="reference" required name="reference" value="{{old('reference')}}">
        </div>
        <div class="mb-3">
            <label for="num_serie" class="form-label">N° Série</label>
            <input type="text" class="form-control" id="num_serie" required name="num_serie" value="{{old('num_serie')}}">
        </div>
        <div class="mb-3">
            <label for="code_immo" class="form-label">Code IMMO</label>
            <input type="text" class="form-control" id="code_immo" required name="code_immo" value="{{old('code_immo')}}">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
