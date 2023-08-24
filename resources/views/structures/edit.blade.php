@extends('layouts.app')

@section('title')
    Modifier une structure
@endsection

@section('content')
    <h1>Modifier une structure</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('structures.update', ['num_structure' => $structure->num_structure])}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="num_structure" class="form-label">N° Structure</label>
            <input disabled readonly type="text" class="form-control" id="num_structure" name="num_structure" value="{{$structure->num_structure}}">
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" required name="designation" value="{{$structure->designation}}">
        </div>

        <div class="mb-3">
            <label for="designation_site" class="form-label">Désignation site</label>
            <select required id="designation_site" name="designation_site" class="form-select">
                <option value="" disabled selected>Sélectionner un site</option>
                @foreach ($sites as $site)
                    <option value="{{ $site }}" @if($structure->designation_site == $site)  selected @endif>{{ $site }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="num_telephone" class="form-label">Région</label>
            <select required name="region" class="form-select">
                <option value="" disabled selected>Sélectionner une région</option>
                @foreach ($regions as $region)
                    <option value="{{ $region }}" @if($structure->region == $region)  selected @endif>{{ $region }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
