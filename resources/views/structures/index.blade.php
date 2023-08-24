@extends('layouts.app')

@section('title')
    Structures
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Structures</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('structures.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>N° Strcuture</th>
            <th>Désignation</th>
            <th>Désignation site</th>
            <th>Région</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($structures as $structure)
                <tr>
                    <td>{{ $structure->num_structure }}</td>
                    <td>{{ $structure->designation }}</td>
                    <td>{{ $structure->designation_site }}</td>
                    <td>{{ $structure->region }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('structures.edit', ['num_structure' => $structure->num_structure]) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('structures.destroy', ['num_structure' => $structure->num_structure]) }}"
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
