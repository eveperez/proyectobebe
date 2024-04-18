<head>
    <!-- Tu código del encabezado aquí -->
    <style>
        /* Agrega estilos CSS aquí */
        .estatus {
            color: while;
            margin-top: 10px; /* Espaciado superior para separar un poco el texto */
        }
    </style>
</head>

<div class="container">
<br>
<center>
<div>
        <h4 class="estatus">Estatus: {{ $estadoProducto }}</h4>
    </div>
<br>
</center>
    <table class="table table-hover">
    <thead>
    <tr class="table-secondary">
        <td>Clave</td>
        <td>Fecha</td>
        <td>Monto</td>
    </tr>
    </thead>
    <tbody>
        @foreach($consultai as $c)
        <tr class="table-light">
        <td>{{$c->idcompra}}</td>
        <td>{{$c->fecha}}</td>
        <td>{{$c->total}}</td>
        <td>

        </td>
        </tr>
        @endforeach

    </tbody>
    </table>
</div>


        