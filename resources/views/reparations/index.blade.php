@extends('layouts.app')

@section('title')
    Réparations (Décharges fournisseur)
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Réparations (Décharges fournisseur)</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('decharges_fournisseur.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>Code de décharge</th>
            <th>Matériels</th>
            <th>Probléme</th>
            <th>Fournisseur</th>
            <th>Observation</th>
            <th>Date de décharge</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($decharges_fournisseur as $decharge_fournissuer)
                <tr>
                    <td>{{ $decharge_fournissuer->code_decharge }}</td>
                    <td>
                        @foreach ($decharge_fournissuer->materiels as $materiel)
                            <div class="badge bg-secondary">
                                {{ $materiel->designation }}
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $decharge_fournissuer->probleme }}</td>
                    <td>{{ $decharge_fournissuer->fournisseur?->nom }}</td>
                    <td>{{ $decharge_fournissuer->observation }}</td>
                    <td>{{ $decharge_fournissuer->date_decharge }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('decharges_fournisseur.edit', $decharge_fournissuer->code_decharge) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('decharges_fournisseur.destroy', $decharge_fournissuer->code_decharge) }}"
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
