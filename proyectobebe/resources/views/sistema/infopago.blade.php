@if($tipo==1)
    <div class="mb-3">
            <label for="cd" class="form-label">Cantidad de Dinero</label>
            <input type="text" name='cd' id='cd' class="form-control" placeholder="0">
    </div>

    <div class="mb-3">
            <label for="cambio" class="form-label">Cambio</label>
            <input type="text" name='cambio' id='cambio' class="form-control" placeholder="0">
    </div>

@else

    <div class="mb-3">
            <label for="numt" class="form-label">Número de tarjeta</label>
            <input type="text" name='numt' id='numt' class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx">
    </div>

    <div class="mb-3">
            <label for="fechaPres" class="form-label">Fecha</label>
            <input type="date" class="form-control" placeholder="">
    </div>

    <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" name='cvv' id='cvv' class="form-control" placeholder="xxx">
    </div>

@endif

<script type="text/javascript">
    $(document).ready(function(){

        $("#cd").keyup(function() {
            var cd = parseInt($("#cd").val());
            var cambio = parseInt($("#cant").val());
            var monto = parseInt($("#monto").val());

            if (cd < 0) {
                alert('Introduce más dinero');
            } else if (monto <= cd) {
                cambio = cd - monto;
                $("#cambio").val(cambio);
            } else {
                alert('Falta dinero');
            }
        });

    });
</script>
