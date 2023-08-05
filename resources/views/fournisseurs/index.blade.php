@extends('layouts.app')

@section('title')
    Fournisseurs
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Fournisseurs</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('fournisseurs.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>N° Fournisseur</th>
            <th>Nom</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->num_fournisseur }}</td>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('fournisseurs.edit', $fournisseur->num_fournisseur) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('fournisseurs.destroy', $fournisseur->num_fournisseur) }}"
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
