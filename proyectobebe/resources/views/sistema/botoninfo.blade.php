<style>
    table.table {
        color: white; /* Color del texto de la tabla */
    }

    table.table th,
    table.table td {
        color: light; /* Color del texto de las celdas */
    }
</style>

<br>
<table class="table">
    <thead class="table-secondary">
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productosventa as $c)
        <tr>
        <th scope="row">{{$c->nombrepro}}</th>
        <td>{{$c->cantidad}}</td>
        <td>{{$c->precio}}</td>
        <td>{{$c->subtotal}}</td>
        <td>
        <form action='' method = 'POST' enctype='application/x-www-form-urlencoded'
            name='frmdo{{$c->iddetalle}}' id='frmdo{{$c->iddetalle}}' target='_self'>
            <input type = 'hidden' value = '{{$c->iddetalle}}' name = 'iddetalle' id= 'iddetalle'>
            <input type = 'hidden' value = '{{$c->nombre}}' name = 'nombre' id= 'nombre'>
            <input type = 'hidden' value = '{{$c->cantidad}}' name = 'cantidad' id= 'cantidad'>
            <input type = 'hidden' value = '{{$c->precio}}' name = 'precio' id= 'precio'>
            <input type = 'hidden' value = '{{$c->idcompra}}' name = 'idcompra' id= 'idcompra'>
            <input type='button' name='borrar' class='borrar' value='borrar' />
        </form>
        </td>
        </tr>
        @endforeach
            <tr><td colspan = 3><h5><center>Total</center><h5></td><td>{{$totalventa->total}}
        </td></tr>
    </tbody>
</table>

<script type="text/javascript">
$(function () {
    $('.borrar').click(
        function () {
            formulario = this.form;
            $("#lista").load('{{url('borracompra')}}' + '?' + $(this).closest('form').serialize()) ;
        }
    );
});
</script>
