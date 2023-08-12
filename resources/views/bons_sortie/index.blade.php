@extends('layouts.app')

@section('title')
    Bons de sortie
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Bons de sortie</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('bons_sortie.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>N° Bon sortie</th>
            <th>Employé</th>
            <th>Matériel</th>
            <th>Observation</th>
            <th>Date de sortie</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($bons_sortie as $bon_sortie)
                <tr>
                    <td>{{ $bon_sortie->num_bs }}</td>
                    <td>{{ $bon_sortie->employe->nom .' '. $bon_sortie->employe->prenom }}</td>
                    <td>{{ $bon_sortie->materiel->designation }}</td>
                    <td>{{ $bon_sortie->observation }}</td>
                    <td>{{ $bon_sortie->date_sortie }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bons_sortie.edit', $bon_sortie->num_bs) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('bons_sortie.destroy', $bon_sortie->num_bs) }}"
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
