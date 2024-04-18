@extends('sistema.main')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <h2>ROPA PARA BEBÉ</h2>
    <br>
    <form action="{{ route('guardarcompra') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="idcompra" class="form-label">No. de Compra</label>
        <input type="text" name='idcompra' id="idcompra" class="form-control" placeholder="" value="{{$siguiente}}" readonly='readonly'>
        @if($errors->first('idcompra'))
        <p class="text-danger">{{ $errors->first('idcompra') }}</p>
        @endif
    </div>

    <div class="form-group">
        <label for="idprove" class="form-label mt-4">Proveedor</label>
        <select class="form-select" name="idprove" id="idprove">
            <option value="">Selecciona un prooveedor</option>
            @foreach($proveedores as $prove)
                    <option value="{{$prove->idprove}}">{{ $prove->nombrepro }}</option>
                @endforeach
            </select>
            @if($errors->first('idprove'))
                <p class="text-danger">{{ $errors->first('idprove') }}</p>
            @endif
    </div>

    <div class="form-group">
        <label for="idcliente" class="form-label mt-4">Cliente</label>
        <select class="form-select" name="idcliente" id="idcliente">
            <option value="{{old('idcliente')}}">Selecciona un cliente</option>
            @foreach($clientes as $cli)
                <option value="{{$cli->idcliente}}">{{$cli->nombrecli}}</option>
            @endforeach
        </select>
    </div>
    <div id="infocliente"></div>


    <div class="form-group">
            <label for="fecha" class="form-label mt-4">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control"  placeholder="" required>
    </div>

        <div class="form-group">
            <label for="idcate" class="form-label mt-4">Tipo de producto</label>
            <select class="form-select" name="idcate" id="idcate">
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $ca)
                    <option value="{{$ca->idcate}}">{{ $ca->nombre }}</option>
                @endforeach
            </select>
            @if($errors->first('idcate'))
                <p class="text-danger">{{ $errors->first('idcate') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="idpro" class="form-label mt-4">Producto</label>
            <select class="form-select" name="idpro" id="idpro">
                <option value="{{old('idpro')}}">Selecciona un producto</option>
            </select>
        </div>
        <div id="infoproducto"></div>

                
        <div id="talla_fields" style="display:none;">
            <div class="form-group">
                <label class="form-label mt-4">Talla</label>
                <div>
                    <input type="radio" name="talla" value="1-3 meses" /> 1-3 meses
                    <input type="radio" name="talla" value="3-6 meses" /> 3-6 meses
                    <input type="radio" name="talla" value="6-12 meses" /> 6-12 meses
                </div>
                @if($errors->first('talla'))
                    <p class="text-danger">{{ $errors->first('talla') }}</p>
                @endif
            </div>
        </div>

        <div id="genero_fields" style="display:none;">
            <div class="form-group">
                <label class="form-label mt-4">Género</label>
                <div>
                    <input type="radio" name="genero" value="H" /> H
                    <input type="radio" name="genero" value="M" /> M
                </div>
                @if($errors->first('genero'))
                    <p class="text-danger">{{ $errors->first('genero') }}</p>
                @endif
            </div>
        </div>
        
        <div id='infocompra'></div>

        <br>
        <button type="button" class="btn btn-info" id="insertar" disabled=true>Agregar</button>
        <div id='lista'></div>

        <br>
        <button type="submit" class="btn btn-secondary custom-button" name="guardar" value="Guardar">Guardar</button>

    </form>
    
    

    <script type="text/javascript">
        $(document).ready(function(){

            $("#idcliente").click(function() {
                $("#infocliente").load('{{url('infocliente')}}' + '?idcliente='  +this.options[this.selectedIndex].value) ;
            });

            $("#idcate").click(function() {
                $("#idpro").load('{{url('combocategoria')}}' + '?idcate='  +this.options[this.selectedIndex].value) ;
            });

            $("#idpro").click(function() {
                $("#infoproducto").load('{{url('infoproducto')}}' + '?idpro='  +this.options[this.selectedIndex].value) ;
            });

            $("#idpro").click(function() {
                $("#infocompra").load('{{url('infocompra')}}' + '?idpro='  +this.options[this.selectedIndex].value) ;
                $("#insertar").removeAttr('disabled');
            });

            $("#insertar").click(function() {
            $("#lista").load('{{url('botoninfo')}}' + '?' + $(this).closest('form').serialize());
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#idcate").change(function() {
                var categoriaSeleccionada = $(this).val();
                if (categoriaSeleccionada == "1") {
                    $("#talla_fields").show();
                    $("#genero_fields").show();
                } else {
                    $("#talla_fields").hide();
                    $("#genero_fields").hide();
                }
            });
        });
    </script>

<script>
    $(document).ready(function () {
        // Ocultar el botón al principio
        $('.custom-button').hide();

        // Activar el botón 'Agregar'
        $('#insertar').on('click', function () {
            $('.custom-button').show(); // Hacer visible el botón
        });

        $('.custom-button').on('click', function () {
            $('#insertar').prop('disabled', true);
        });
    });
</script>


</body>
</html>

@endsection
