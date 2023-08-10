@extends('layouts.app')

@section('title')
    Réformations (Décharges structure)
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Réformations (Décharges structure)</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('decharges_structure.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>Code de décharge</th>
            <th>Matériels</th>
            <th>Structure</th>
            <th>Employé</th>
            <th>Date de décharge</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($decharges_structure as $decharge_structure)
                <tr>
                    <td>{{ $decharge_structure->code_decharge }}</td>
                    <td>
                        @foreach ($decharge_structure->materiels as $materiel)
                            <div class="badge bg-secondary">
                                {{ $materiel->designation }}
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $decharge_structure->employe->structure->designation }}</td>
                    <td>{{ $decharge_structure->employe->nom }}</td>
                    <td>{{ $decharge_structure->date_decharge }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('decharges_structure.edit', $decharge_structure->code_decharge) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('decharges_structure.destroy', $decharge_structure->code_decharge) }}"
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
