<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(180deg, #00D4EA 20.1%, #E8EAE9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 100%;
            max-width: 400px;
        }

        .login-box h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .login-box p {
            margin-bottom: 20px;
            color: #666;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .options label {
            color: #333;
        }

        .options a {
            color: #1e90ff;
            text-decoration: none;
        }

        .login-btn {
            background: #1e90ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.2em;
            transition: background 0.3s ease;
        }

        .login-btn:hover {
            background: #1c86ee;
        }

        .illustration {
            position: absolute;
            width: 980px;
            height: 864px;
            left: 560px;
            top: 60px;

            background: url(objek.png);
            filter: drop-shadow(-10px 5px 4px rgba(0, 0, 0, 0.25));

        }

        .illustration img {
            width: 100%;
            height: auto;
            transition: transform 1s ease;
            /* Add transition for smooth movement */
        }

        /* Welcome! */
        .welcome {

            position: absolute;
            width: 498px;
            height: 144px;
            left: 67px;
            top: 68px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-size: 96px;
            line-height: 144px;
            /* identical to box height */

            color: #FFFFFF;
        }

        /* please login to your account */
        .please {

            position: absolute;
            width: 471px;
            height: 50px;
            left: 85px;
            top: 165px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-size: 33px;
            line-height: 50px;
            /* identical to box height */

            color: #FFFFFF;
        }

        /* Username/Email Address */
        .form {
            position: absolute;
            width: 471px;
            height: 10px;
            left: 85px;
            top: 350px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            /* identical to box height */

            color: #FFFFFF;
        }

        .planet {
            position: absolute;
            width: 250px;
            height: 870px;
            left: 1270px;
            top: 40px;
            cursor: pointer;
            filter: drop-shadow(-10px 5px 4px rgba(0, 0, 0, 0.25));
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .planet img {
            width: 100%;
            height: auto;
            transition: transform 1s ease;
            /* Add transition for smooth movement */
        }

        .planet:hover {
            transform: scale(1.2)
                /* opacity: 0.8; */
        }

        .planet2 {
            position: absolute;
            width: 110px;
            height: 870px;
            left: 745px;
            top: 130px;
            cursor: pointer;
            background: url(objek.png);
            filter: drop-shadow(-10px 5px 4px rgba(0, 0, 0, 0.25));
        }

        .planet2 img {
            width: 100%;
            height: auto;
            transition: transform 1s ease;
            /* Add transition for smooth movement */
        }

        .awan {
            position: absolute;
            width: 650px;
            height: 870px;
            left: 738px;
            top: 83px;

            background: url(objek.png);
            filter: drop-shadow(-10px 5px 4px rgba(0, 0, 0, 0.25));
        }

        .awan img {
            width: 100%;
            height: auto;
            transition: transform 1s ease;
            /* Add transition for smooth movement */
        }

        .alert {
            top: 250px;
            left: 85px;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong> ID Pengguna atau password salah!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h1 class="welcome">Welcome!</h1>
        <p class="please">please login to your account</p>
        <form action="/login" method="post" class="form">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">ID Pengguna / User</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}">
                @error('id')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="options">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="login-btn">Login ➔</button>
        </form>
        <div class="planet">
            <img src="{{ asset('storage/upload/planet 1.png') }}" alt="Illustration">
        </div>
        <div class="planet2">
            <img src="{{ asset('storage/upload/planet 2.png') }}" alt="Illustration">
        </div>
        <div class="awan">
            <img src="{{ asset('storage/upload/awan.png') }}" alt="Illustration">
        </div>
        <div class="illustration">
            <img src="{{ asset('storage/upload/bg.png') }}" alt="Illustration">
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>