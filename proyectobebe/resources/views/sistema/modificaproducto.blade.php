@extends('sistema.main')

@section('contenido')
    <h3>MODIFICAR INFORMACIÓN DEL PRODUCTO</h3>
    <form action="{{ route('editarproducto', ['idpro' => $infoProducto->idpro]) }}" method="POST" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name='nombre' value="{{ old('nombre', $infoProducto->nombre) }}" class="form-control">
            @if($errors->first('nombre'))
                <p class="text-danger">{{ $errors->first('nombre') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name='descripcion' value="{{ old('descripcion', $infoProducto->descripcion) }}" class="form-control">
            @if($errors->first('descripcion'))
                <p class="text-danger">{{ $errors->first('descripcion') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="idcate" class="form-label">Categoría</label>
            <td><select name="idcate" class="form-control">
                    <option value ="{{$infoProducto->idcate}}">{{$infoProducto->ncategoria}} </option>
                    @foreach($categorias as $c)
                    <option value ="{{$c->idcate}}">{{$c->nombre}}</option>
                    @endforeach
                    </select>
                </td>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name='precio' value="{{ old('precio', $infoProducto->precio) }}" class="form-control">
            @if($errors->first('precio'))
                <p class="text-danger">{{ $errors->first('precio') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Talla</label>
            <div>
                <input type="radio" name="talla" value="1-3 meses" {{ old('talla', $infoProducto->talla) == '1-3 meses' ? 'checked' : '' }} /> 1-3 meses
                <input type="radio" name="talla" value="3-6 meses" {{ old('talla', $infoProducto->talla) == '3-6 meses' ? 'checked' : '' }} /> 3-6 meses
                <input type="radio" name="talla" value="6-12 meses" {{ old('talla', $infoProducto->talla) == '6-12 meses' ? 'checked' : '' }} /> 6-12 meses
            </div>
            @if($errors->first('talla'))
                <p class="text-danger">{{ $errors->first('talla') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Genero</label>
            <div>
                <input type="radio" name="genero" value="H" {{ old('genero', $infoProducto->genero) == 'H' ? 'checked' : '' }} />H
                <input type="radio" name="genero" value="M" {{ old('genero', $infoProducto->genero) == 'M' ? 'checked' : '' }} />M
                <input type="radio" name="genero" value="Indistinto" {{ old('genero', $infoProducto->genero) == 'Indistinto' ? 'checked' : '' }} />Indistinto
            </div>
            @if($errors->first('genero'))
                <p class="text-danger">{{ $errors->first('genero') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" name='color' value="{{ old('color', $infoProducto->color) }}" class="form-control">
            @if($errors->first('color'))
                <p class="text-danger">{{ $errors->first('color') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Foto</label>
            <input type="file" name='archivo' class="form-control">
            @if($errors->first('archivo'))
                <p class="text-danger">{{ $errors->first('archivo') }}</p>
            @endif
        </div>

        <br>
        <button type="submit" class="btn btn-secondary">Guardar</button>
</form>
@endsection
    



