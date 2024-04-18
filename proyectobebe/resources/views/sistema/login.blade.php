@extends('sistema.vistaprincipal')

@section('vistaprincipal')

<!DOCTYPE html>
<div class="container">
    <hr>
    <h1>Inicio de sesion</h1>
    <hr>
    <form action="{{route('validar')}}" method="POST">
        {{csrf_field()}}
        <div class="well">
            <div class="form-group">
                <label for="dni">Usuario:
                    @if($errors->first('usuario'))
                    <p class='text-danger'>{{$errors->first('usuario')}}</p>
                    @endif
                </label>
                <input type="text" class="form-control" name="usuario" id="usuario" value="" placeholder="Usuario">
            </div>
            <div>
                <div class="form-group">
                    <label for="dni">Password:
                        @if($errors->first('pasw'))
                        <p class='text-danger'>{{$errors->first('pasw')}}</p>
                        @endif
                    </label>
                    <input type="password" class="form-control" name="pasw" id="pasw" value="" placeholder="Usuario">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="submit" value="Iniciar" class="btn btn-outline-danger" title="Iniciar">
                </div>
            </div>
        </div>
    </form>
    <br>
    @if(Session::has('mensaje'))
        <div class="alert alert-dismissible alert-danger">{{Session::get('mensaje')}}</div>
    @endif
    @stop