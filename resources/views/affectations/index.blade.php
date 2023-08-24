@extends('layouts.app')

@section('title')
    Affectations
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Affectations</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('affectations.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>Code d'ffectation</th>
            <th>Employé</th>
            <th>Matériel</th>
            <th>Date d'affectation</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($affectations as $affectation)
                <tr>
                    <td>{{ $affectation->code_affectation }}</td>
                    <td>{{ $affectation->employe?->nom}}</td>
                    <td>{{ $affectation->materiel?->designation }}</td>
                    <td>{{ $affectation->date_affectation }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('affectations.edit', $affectation->code_affectation) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('affectations.destroy', $affectation->code_affectation) }}"
                                class="btn btn-danger btn-sm" data-confirm-delete="true">
                                <i class="fa-solid fa-trash-can"></i> Supprimer
                            </a>

                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
