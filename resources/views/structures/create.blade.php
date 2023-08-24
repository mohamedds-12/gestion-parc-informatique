@extends('layouts.app')

@section('title')
    Creér une structure
@endsection


@section('content')
    <h1 class="mb-3">Creér une structure</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('structures.store')}}">
        @csrf

        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" required name="designation" value="{{old('designation')}}">
        </div>
        <div class="mb-3">
            <label for="designation_site" class="form-label">Désignation site</label>
            <select required id="designation_site" name="designation_site" class="form-select">
                <option value="" disabled selected>Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{ $site }}">{{ $site }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="num_telephone" class="form-label">Région</label>
            <select required name="region" class="form-select">
                <option value="" disabled selected>Sélectionner une région</option>
                @foreach ($regions as $region)
                    <option value="{{ $region }}">{{ $region }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
