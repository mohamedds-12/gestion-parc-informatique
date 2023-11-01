<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}"> --}}

    <style>

        td:first-child {
            font-weight: bold;
            width: 20%;
        }

        td, th {
            border: 1px solid black;
            padding: 5px 5px
        }

        body {
            margin-bottom: 15rem;
        }
    </style>
</head>

<body>

    <div class="container px-5" style="position: relative">
        <h4 class="mb-4" style="text-align: center">
            SOCIETE DES AUX ET DE L'ASSAINISSEMENT D'ALGER SEAAL
        </h4>
        <h1 style="text-align: center; margin-bottom: 40px"> DECHARGE FOURNISSUER</h1>


        <div style="margin-bottom: 5px">
            <strong>Date déchargé :</strong>
            <span>{{ \Carbon\Carbon::parse($decharge_fournisseur->date_decharge)->format('d/m/Y') }}</span>
        </div>
        <div>
            <strong>Code decharge :</strong>
            <span>{{ $decharge_fournisseur->code_decharge }}</span>
        </div>
        <div>
            <strong>Direction :</strong>
            <span>DSI</span>
        </div>

        <div style="margin-top: 40px">
            <span>
                Nous reconnaissons remis au fournisseur <b>"{{ $decharge_fournisseur->fournisseur->nom }}"</b>
                la list des matériels suivant :
            </span>
            <br>

            <table class="table table-bordered border-dark mt-3">
                <thead>
                    <tr>
                        <th></th>
                        <th>Matricule</th>
                        <th>Désignation</th>
                        <th>Modéle</th>
                        <th>Référence</th>
                        <th>N° Série</th>
                        <th>Code IMMO</th>
                    </tr>
                </thead>

                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($decharge_fournisseur->materiels as $materiel)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $materiel->matricule }}</td>
                            <td>{{ $materiel->designation }}</td>
                            <td>{{ $materiel->modele }}</td>
                            <td>{{ $materiel->reference }}</td>
                            <td>{{ $materiel->num_serie }}</td>
                            <td>{{ $materiel->code_immo }}</td>
                        </tr>
                        @php $i++ @endphp
                    @endforeach
                </tbody>

            </table>
            <br>

            @if ($decharge_fournisseur->probleme)
                <b>Le probléme : </b>
                <span>{{ $decharge_fournisseur->probleme }}</span>
                <br>
            @endif

            @if ($decharge_fournisseur->observation)
                <b>L'observation : </b>
                <span>{{ $decharge_fournisseur->observation }}</span>
            @endif

        </div>

        <div style="position: relative; margin-top: 60px">
            <u >
                <b>L'intervenant :</b>
            </u>

            <u style="right: 20px; position: absolute">
                <b>Le fournisseur :</b>
            </u>
        </div>
    </div>
</body>

</html>
