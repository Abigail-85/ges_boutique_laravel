<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Boutique de Ali</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .navbar{
            margin-bottom:20px;
        }

        footer{
            margin-top:40px;
            text-align:center;
            padding:15px;
            background:#212529;
            color:white;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="/">Gestion de Boutique de Ali</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('commandes.index') }}">Commandes</a>
</li>


</ul>

</div>

</div>

</nav>

<div class="container">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@yield('content')

</div>

<footer>

Gestion de Boutique de Ali © 2026

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>