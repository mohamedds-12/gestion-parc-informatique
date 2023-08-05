@extends('layouts.app')

@section('title')
    Matériels
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Matériels</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('materiels.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>Matricule</th>
            <th>Désignation</th>
            <th>Modéle</th>
            <th>Référence</th>
            <th>Etat</th>
            <th>N° Série</th>
            <th>Code IMMO</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($materiels as $materiel)
                <tr>
                    <td>{{ $materiel->matricule }}</td>
                    <td>{{ $materiel->designation }}</td>
                    <td>{{ $materiel->modele }}</td>
                    <td>{{ $materiel->reference }}</td>
                    <td>
                        @switch($materiel->etat)
                            @case(App\Enums\MaterielStatus::Non_Affecte->value)
                                <span class="badge bg-secondary">{{ $materiel->etat }}</span>
                                @break

                                @case(App\Enums\MaterielStatus::Affecte->value)
                                <span class="badge bg-success">{{ $materiel->etat }}</span>
                                @break

                                @case(App\Enums\MaterielStatus::En_Reparation->value)
                                <span class="badge bg-warning">{{ $materiel->etat }}</span>
                                @break

                                @case(App\Enums\MaterielStatus::En_Reformation->value)
                                <span class="badge bg-danger">{{ $materiel->etat }}</span>
                                @break
                        @endswitch

                    </td>
                    <td>{{ $materiel->num_serie }}</td>
                    <td>{{ $materiel->code_immo }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('materiels.edit', $materiel->matricule) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('materiels.destroy', $materiel->matricule) }}"
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
