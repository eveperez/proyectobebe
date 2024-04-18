@extends('sistema.main')

@section('contenido')
    <h3>ALTA DE PRODUCTOS</h3>
    <form action="{{ route('guardarproducto') }}" method="POST" enctype='multipart/form-data' class="formulario">
        {{ csrf_field() }}

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name='nombre' value="{{ old('nombre') }}" class="form-control">
            @if($errors->first('nombre'))
                <p class="text-danger">{{ $errors->first('nombre') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name='descripcion' value="{{ old('descripcion') }}" class="form-control">
            @if($errors->first('descripcion'))
                <p class="text-danger">{{ $errors->first('descripcion') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="idcate" class="form-label mt-4">Categoría</label>
            <select class="form-select" name="idcate">
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $ca)
                    <option value="{{$ca->idcate}}">{{ $ca->nombre }}</option>
                @endforeach
            </select>
            @if($errors->first('idcate'))
                <p class="text-danger">{{ $errors->first('idcate') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name='precio' value="{{ old('precio') }}" class="form-control">
            @if($errors->first('precio'))
                <p class="text-danger">{{ $errors->first('precio') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Talla</label>
            <div>
                <input type="radio" name="talla" value="1-3 meses" {{ old('talla') == '1-3 meses' ? 'checked' : '' }} /> 1-3 meses
                <input type="radio" name="talla" value="3-6 meses" {{ old('talla') == '3-6 meses' ? 'checked' : '' }} /> 3-6 meses
                <input type="radio" name="talla" value="6-12 meses" {{ old('talla') == '6-12 meses' ? 'checked' : '' }} /> 6-12 meses
            </div>
            @if($errors->first('talla'))
                <p class="text-danger">{{ $errors->first('talla') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Genero</label>
            <div>
                <input type="radio" name="genero" value="H" {{ old('genero') == 'H' ? 'checked' : '' }} />H
                <input type="radio" name="genero" value="M" {{ old('genero') == 'M' ? 'checked' : '' }} />M
                <input type="radio" name="genero" value="Indistinto" {{ old('genero') == 'Indistinto' ? 'checked' : '' }} />Indistinto
            </div>
            @if($errors->first('genero'))
                <p class="text-danger">{{ $errors->first('genero') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" name='color' value="{{ old('color') }}" class="form-control">
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

        <!-- <div class="mb-3">
            <label for="fechapedido" class="form-label">Fecha del Pedido</label>
            <input type="date" name='fechapedido' value="{{ old('fechapedido') }}" class="form-control">
            @if($errors->first('fechapedido'))
                <p class="text-danger">{{ $errors->first('fechapedido') }}</p>
            @endif
        </div> -->

        <br>
        <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
@endsection

