<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | GPI</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="{{asset('images/logo.png')}}" class="logo">
            <ul>
                <li> <a href="{{route('aboutUs')}}">A propos de nous</a></li>

                <!-- <li> <a href="#">Fiche</a></li>
                <li> <a href="#">Document</a></li>
                <li> <a href="#"></a></li> -->

            </ul>
        </div>
        <div class="content">

            <h1>Gestion parc informatique</h1>
            <p>est un logiciel libre de gestion des services informatiques (ITSM) et de gestion des services d'assistance</p>
            <div>
                <button type="button" onclick="goToNextPage()"><span></span> SE CONNECTER</button>

                <script>
                    function goToNextPage() {
                        window.location.href = "{{route('login')}}";
                    }
                </script>
            </div>

        </div>


    </div>


</body>
</html>
