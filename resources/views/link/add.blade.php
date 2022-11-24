@extends('layouts.app')

@section('title', 'Links')

@section('content')
    @include('components.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="well well-sm">
                    <form action="{{url('/link/agregar_link')}}" method="post">
                    @csrf
                        <fieldset>
                            <legend class="text-center">Agregar Link</legend>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
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
                                <label for="descripcion">Link</label>
                                <input class="form-control" type="text" name="link" id="link">
                                @error('link')        
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Guardar link">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection