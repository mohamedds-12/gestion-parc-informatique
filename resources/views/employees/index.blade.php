@extends('layouts.app')

@section('title')
    Employées
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Employées</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('employees.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered">
        <thead class="table-dark">
            <th>N° Employé</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de téléphone</th>
            <th>Structure</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($employees as $employe)
                <tr>
                    <td>{{ $employe->num_employe }}</td>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->num_telephone }}</td>
                    <td>{{ $employe->structure->designation}}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('employees.edit', $employe->num_employe) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('employees.destroy', $employe->num_employe) }}"
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
