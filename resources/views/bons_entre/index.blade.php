@extends('layouts.app')

@section('title')
    Bons d'entrée
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Bons d'entrée</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('bons_entre.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>N° Bon entré</th>
            <th>Agent</th>
            <th>Employé</th>
            <th>Matériel</th>
            <th>Observation</th>
            <th>Date d'entrée</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($bons_entre as $bon_entre)
                <tr>
                    <td>{{ $bon_entre->num_be }}</td>
                    <td>{{ $bon_entre->agent->nom .' '. $bon_entre->agent->prenom }}</td>
                    <td>{{ $bon_entre->employe->nom .' '. $bon_entre->employe->prenom }}</td>
                    <td>{{ $bon_entre->materiel->designation }}</td>
                    <td>{{ $bon_entre->observation }}</td>
                    <td>{{ $bon_entre->date_entre }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bons_entre.edit', $bon_entre->num_be) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('bons_entre.destroy', $bon_entre->num_be) }}"
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
