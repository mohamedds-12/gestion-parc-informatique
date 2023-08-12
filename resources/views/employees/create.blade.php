@extends('layouts.app')

@section('title')
    Ajouter un employé
@endsection


@section('content')
    <h1 class="mb-3">Creér un employé</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('employees.store')}}">
        @csrf

        <div class="mb-3">
            <label for="matricule" class="form-label">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" value="{{old('matricule')}}" required>
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" required name="nom" value="{{old('nom')}}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" required name="prenom" value="{{old('prenom')}}" required>
        </div>
        <div class="mb-3">
            <label for="num_telephone" class="form-label">Numéro de téléphone </label>
            <input type="text" class="form-control" id="num_telephone" name="num_telephone" value="{{old('num_telephone')}}" required>
        </div>
        <div class="mb-3">
            <label for="structure" class="form-label">Structure</label>
            <select required name="num_structure" class="form-select" required>
                @foreach ($structures as $structure)
                    <option value="{{ $structure->num_structure}}">{{ $structure->designation}}</option>
                @endforeach
            <select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
