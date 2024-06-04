<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Etudiants | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/linearicons@1.0.0/dist/font/linearicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        body {
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .card form {
            display: flex;
            flex-direction: column;
        }
        .card label {
            text-align: left;
            color: #555;
        }
        .card input[type="email"], .card input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .card input[type="submit"] {
            background-color: #ffcc00;
            color: #000;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .card input[type="submit"]:hover {
            background-color: #e6b800;
        }
        .card .d-block a {
            color: #007bff;
        }
        .card .d-block a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header id="header">
    <div class="header-top">
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></a>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Accueil</a></li>
                    <li><a href="/about">À propos</a></li>
                    <li><a href="/service">Services</a></li>
                    <li><a href="/gallery">Galerie</a></li>
                    <li class="menu-has-children"><a href="">Se Connecter</a>
                        <ul>
                            <li><a href="/passager/login">Passager</a></li>
                            <li class="menu-has-children"><a href="">Employé</a>
                                <ul>
                                    <li><a href="/admin/login">Admin</a></li>
                                    <li><a href="/chauffeur/login">Chauffeur</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="card">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input type="submit" value="Se connecter">
        <span class="d-block text-center mt-3">Vous n'avez pas de Compte ? <a href="{{ route('register') }}">S'inscrire</a></span>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
