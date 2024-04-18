@extends('sistema.main')

@section('contenido')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de compras</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <h1 class="text-center mt-4">Reporte de Compras</h1>
        <br>

        @if(Session::has('mensaje'))
            <div class="alert alert-dismissible alert-primary">{{ Session::get('mensaje') }}</div>
        @endif
        <br>

        <a href="{{ route('altacompra') }}" class="btn btn-info btn-block mb-3">Nueva Compra</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Fecha de operación</th>
                    <th scope="col">Monto total</th>
                    <th scope="col">OPERACIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultar as $c)
                    <tr>
                        <td>{{ $c->idcompra }}</td>
                        <td>{{ $c->fecha }}</td>
                        <td>{{ $c->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

</body>
</html>

@endsection
