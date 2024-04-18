        
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad Disponible</label>
            <input type="text" name='cantidad' id='cantidad' value="{{$consultac->cantidad }}" class="form-control" placeholder="" readonly=readonly>
            @if($errors->first('cantidad'))
                <p class="text-danger">{{ $errors->first('cantidad') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Precio del Producto</label>
            <input type="text" name='costo' id='costo' value="{{$consultac->precio }}" class="form-control" placeholder="" readonly=readonly>
            @if($errors->first('precio'))
                <p class="text-danger">{{ $errors->first('precio') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="cant" class="form-label">Cantidad a elegir</label>
            <input type="text" name='cant' id='cant' class="form-control" placeholder="">
            @if($errors->first('cant'))
                <p class="text-danger">{{ $errors->first('cant') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="monto" class="form-label">Monto a pagar</label>
            <input type="text" name='monto' id='monto' class="form-control" placeholder="">
            @if($errors->first('monto'))
                <p class="text-danger">{{ $errors->first('monto') }}</p>
            @endif
        </div>  

        <div class="mb-3">
            <label class="form-label">Metodo de Pago</label>
            <div>
                <input type="radio" name="tipo" id='tipo1' value="1" checked=""/> Efectivo
                <input type="radio" name="tipo" id='tipo2' value="2"/> Tarjeta
            </div>
        </div>

        <div id='infopago'></div>

    <script type="text/javascript">
        $(document).ready(function(){

		$("#cant").keyup(function() {
			var costo, c,monto,cantidad;
			costo= parseInt($("#costo").val());
			c = parseInt($("#cant").val());
			cantidad = parseInt($("#cantidad").val());
			if (c<=cantidad)
				{
				monto = costo * c;
				$("#monto").val(monto);
			}
			else
				{
					alert('La cantidad supera la existencia');
					$("#cant").val(0);
					$("#monto").val(0);
				}
		});


            $("input[name=tipo]").click(function() {
            $("#infopago").load('{{url('infopago')}}' + '?' + $(this).closest('form').serialize()) ;
            });

        });
    </script>