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

        table td {
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
        <h1 style="text-align: center; margin-bottom: 40px"> FICHE D'AFFECTATION</h1>


        <div style="margin-bottom: 5px">
            <strong>Date d'affectation :</strong>
            <span>{{ \Carbon\Carbon::parse($affectation->date_affectation)->format('d/m/Y') }}</span>
        </div>
        <div>
            <strong>Code d'affectation :</strong>
            <span>{{ $affectation->code_affectation }}</span>
        </div>

        <div style="margin-top: 40px">
            <u>
                <strong>L'employé :</strong>
            </u>
            <div class="">
                <table class="table table-bordered border-dark mt-3 mb-5">
                    <tbody>
                        <tr>
                            <td >Matricule</td>
                            <td >{{ $affectation->employe->matricule }}</td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td>{{ $affectation->employe->nom }}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{ $affectation->employe->prenom }}</td>
                        </tr>
                        <tr>
                            <td>Structure</td>
                            <td>{{ $affectation->employe->structure->designation }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $affectation->employe->structure->region }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <u>
                <strong>Le matériel :</strong>
            </u>
            <table class="table table-bordered border-dark mt-3">
                <tr>
                    <td>Matricule</td>
                    <td>{{ $affectation->materiel->matricule }}</td>
                </tr>
                <tr>
                    <td>Désignation</td>
                    <td>{{ $affectation->materiel->designation }}</td>
                </tr>
                <tr>
                    <td>Modéle</td>
                    <td>{{ $affectation->materiel->modele }}</td>
                </tr>
                <tr>
                    <td>Référence</td>
                    <td>{{ $affectation->materiel->reference }}</td>
                </tr>
                <tr>
                    <td>N° Série</td>
                    <td>{{ $affectation->materiel->num_serie }}</td>
                </tr>
                <tr>
                    <td>Code IMMO</td>
                    <td>{{ $affectation->materiel->code_immo }}</td>
                </tr>
            </table>
        </div>

        <div style="position: relative; margin-top: 40px">
            <u >
                <b>Le chef de service :</b>
            </u>

            <u style="right: 20px; position: absolute">
                <b>L'intéressé(e) :</b>
            </u>
        </div>
    </div>
</body>

</html>
