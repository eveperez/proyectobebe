@extends('sistema.main')

@section('contenido')

<h1>Reporte de Productos</h1>
<a href="{{ route('altaproductos') }}" class="alta">
    <button type="button" class="btn btn-success">Alta de Productos</button>
</a>
<br>
<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Talla</th>
                <th>Género</th>
                <th>Color</th>
                <th>Foto</th>
                <th>Categoría</th>
                <th>Activo</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reporte as $r)
            <tr>
                <td>{{ $r->nproducto }}</td>
                <td>{{ $r->descripcion }}</td>
                <td>{{ $r->precio }}</td>
                <td>{{ $r->talla }}</td>
                <td>{{ $r->genero }}</td>
                <td>{{ $r->color }}</td>
                <td>
                    <img src="{{ asset('archivos/'.$r->archivo) }}" height="50" width="50" alt="desc">
                </td>
                <td>{{ $r->ncategoria }}</td>
                <td>{{ $r->activo }}</td>
                <td>
                    @if($r->activo == 'Si')
                        <a href="{{ route('desactivaproducto', ['idpro' => $r->idpro]) }}" class="btn btn-danger btn-sm">Desactivar</a>
                    @else
                        <a href="{{ route('activaproducto', ['idpro' => $r->idpro]) }}" class="btn btn-success btn-sm">Activar</a>
                    @endif
                    @if($r->activo =='Si')
                    <a href="{{ route('modificaproducto', ['idpro' => $r->idpro]) }}" class="btn btn-warning">Modificar</a>
                    @endif
                    <a href= "{{ route('eliminaproducto',['idpro' => $r->idpro])  }}" class="btn btn-info">Eliminar</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop
