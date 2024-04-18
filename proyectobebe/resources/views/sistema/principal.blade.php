@extends('sistema.main')

@section('contenido')

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center" style="position: relative;">
    <div class="row">
        <div class="col-md-6 text-center">
            <h1>Bienvenido/a a nuestra tienda de ropa para bebés</h1>
            <br>
            <br>
            <h2>Misión</h2>
            <p>Nuestra misión es proporcionar ropa de alta calidad y diseño encantador para bebés, asegurando la comodidad y felicidad de los más pequeños y sus padres. Nos esforzamos por ser líderes en la industria al ofrecer productos seguros, duraderos y adorables.</p>
            <br>
            <h2>Visión</h2>
            <p>Como empresa, buscamos ser reconocidos como la marca preferida de ropa para bebés, destacando por nuestra dedicación a la calidad, la innovación en diseño y el compromiso con la satisfacción del cliente. Nos esforzamos por crecer globalmente mientras mantenemos nuestra esencia y valores.</p>
        </div>
        <div class="col-md-6" style="background-image: url('{{ asset('archivos/imagen4.jpg') }}'); background-size: cover; height: 100vh;"></div>
    </div>
</div>

@endsection
