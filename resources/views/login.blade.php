@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="well well-sm">
                <form action="{{url('/login_usuario')}}" method="post">
                @csrf
                    <fieldset>
                        <legend class="text-center">Login</legend>

                        @error('message')        
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" value="{{old('correo')}}">
                        </div>

                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password" value="{{old('password')}}">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Enviar">
                        </div>

                        <div class="form-group">
                            <a href="{{url('/register')}}">¿No tienes cuenta? registrate aqui</a>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection