@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="well well-sm">
                <form action="{{url('/registrar_usuario')}}" method="post">
                @csrf
                    <fieldset>
                        <legend class="text-center">Registro</legend>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                            @error('nombre')        
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" value="{{old('apellido')}}">
                            @error('apellido')        
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" value="{{old('correo')}}">
                            @error('correo')        
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password" value="{{old('password')}}">
                            @error('password')        
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass">Repetir contraseña</label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Enviar">
                        </div>

                        <div class="form-group">
                            <a href="{{url('/')}}">¿Ya tienes cuenta? inicia sesion aqui</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection