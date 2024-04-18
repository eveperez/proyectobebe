<?php
$sessionusuario = session('sessionusuario');
$sessiontipo = session('sessiontipo');
$sessionidu = session('sessionidu');
?>

<html lang="en">
<head>
    <link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Baby Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{route('principal')}}">Inicio</a>
            
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('altaproductos')}}">Productos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('reporteproducto')}}">Reporte de Productos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('altacompra')}}">Carrito</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('reportecompras')}}">Reporte de compras</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('cerrarsesion')}}">Cerrar sessión</a>
    </ul>
    </div>
</div>
</nav>
    @yield('contenido')
</body>
</html>