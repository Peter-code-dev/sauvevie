<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SauveVie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e9edf2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .navbar {
            background-color: #c82333;
        }

        .navbar .nav-link {
            color: #ffffff !important;
        }

        .navbar .nav-link:hover {
            color: #ffcccc !important;
        }

        .section-title {
            color: #c82333;
            font-weight: 600;
        }

        footer {
            background-color: #0d1b2a;
            color: #ffffff;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">🩸 SauveVie</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="/needs">Besoins</a></li>
                <li class="nav-item"><a class="nav-link" href="/campaigns">Campagnes</a></li>
                <li class="nav-item"><a class="nav-link" href="/centers">Centres</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    @yield('content')
</main>

<footer class="text-center py-3">
    <p class="mb-1">© {{ date('Y') }} SauveVie — Plateforme citoyenne de sensibilisation au don de sang</p>
    <p class="mb-0">
        <a href="/mentions-legales" class="text-white text-decoration-none">Mentions légales</a>
        &nbsp;|&nbsp;
        <a href="/confidentialite" class="text-white text-decoration-none">Politique de confidentialité</a>
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
