@extends('layouts.app')

@section('title')
    Agents
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="">Agents</h1>

        <a name="" id="" class="btn btn-primary" href="{{ route('agents.create') }}" role="button">
            <i class="fa-solid fa-circle-plus"></i> Ajouter
        </a>
    </div>

    <table id="dataTable" class="table table-responsive table-bordered">
        <thead class="table-dark">
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th class="text-center" width="20%">Actions</th>
        </thead>
        <tbody>
            @foreach ($agents as $agent)
                <tr>
                    <td>{{ $agent->matricule }}</td>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->prenom }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('agents.edit', $agent) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </a>
                            <form action="{{ route('agents.destroy', $agent) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can"></i> Supprimer
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
