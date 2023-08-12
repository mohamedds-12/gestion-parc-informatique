@extends('layouts.app')

@section('title')
    Bons de transfére
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Bons de transfere</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('bons_transfere.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered table-hover">
        <thead class="table-dark">
            <th>N° Bon transfére</th>
            <th>Matériels</th>
            <th>Ancienne site</th>
            <th>Nouvelle site</th>
            <th>Date de transfere</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($bons_transfere as $bon_transfere)
                <tr>
                    <td>{{ $bon_transfere->num_bt }}</td>
                    <td>
                        @foreach ($bon_transfere->materiels as $materiel)
                            <div class="badge bg-secondary">
                                {{ $materiel->designation }}
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $bon_transfere->ancienne_site }}</td>
                    <td>{{ $bon_transfere->nouvelle_site }}</td>
                    <td>{{ $bon_transfere->date_transfere }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bons_transfere.edit', $bon_transfere->num_bt) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <a href="{{ route('bons_transfere.destroy', $bon_transfere->num_bt) }}"
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
