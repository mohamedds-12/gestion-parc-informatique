<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>
<style>

</style>

    <div class="homeback">
        <h2><a href="{{route('welcome')}}">Home</a></h2>
    </div>
    <div class="wrapper">
        <div class="form-box login">
        <h1>Login</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('login')}}" method="post">
            @csrf

            <div class="input-box">
                <input type="text" name="email" required>
                <label >Email</label>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="Show-Password">
                <label><input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">Show Password</label>
                {{-- <a href="Forgot.html">forgot password?</a> --}}

                <script>
                    function togglePasswordVisibility() {
                        const passwordInput = document.getElementById("password");
                        const showPasswordCheckbox = document.getElementById("showPassword");

                        if (showPasswordCheckbox.checked) {
                            passwordInput.type = "text";
                        } else {
                            passwordInput.type = "password";
                        }
                    }
                </script>

            </div>
            <button type="submit" class="btn"><span></span> Login</button>
            {{-- <div class="register-link">
                <p>
                Don't have an account?
                <a href= "Resgister.html" >Resgister</a>
                </p>

            </div> --}}
        </form>
    </div>
    <!-- <div class="form-box register">
        <h2>Resgister</h2>
        <form action="#">
        <div class="input-box">
            <input type="text"  required>
            <label>Username</label>
            <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="password" id="password"  required>
            <label>Password</label>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <div class="Show-Passwordd">
            <label><input type="checkbox">i agree to the terms & conditions</label>


        <button type="submit" class="btn"><span></span> Resgister</button>
        <div class="register-link">
            <p>
            Already have an account?
            <a href="#" class="login-link">Login</a>
            </p>

        </div>

    </div>
    </form>
</div>
    </div> -->
    <!-- <div class="wrapper"> -->

</div>

    <!-- <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>

     -->
</body>
</html>






