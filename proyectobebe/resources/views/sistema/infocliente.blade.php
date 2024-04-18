<div style="width: 300px; border: 1px solid #ccc; padding: 10px; border-radius: 8px; overflow: hidden;">
    <div style="display: flex; align-items: center;">
        <img src="{{asset('archivos/'.$consultaa->foto)}}" class="cliente-avatar" style="margin-right: 10px;">
        <div>
            <h4>Datos del Cliente</h4>
            <p><strong>Nombre:</strong> {{ $consultaa->nombrecli }}</p>
            <p><strong>Edad:</strong> {{ $consultaa->edad }}</p>
            <p><strong>Sexo:</strong> {{ $consultaa->sexo }}</p>
            <p><strong>Teléfono:</strong> {{ $consultaa->telefono }}</p>
        </div>
    </div>
</div>
<style>
    .cliente-avatar {
        height: 80px; /* Establece la altura deseada */
        width: 80px; /* Establece el ancho deseado */
        object-fit: cover; /* Ajusta la imagen para cubrir todo el contenedor manteniendo su relación de aspecto */
    }
</style>
