@extends('layouts.app')

@section('title', 'Notas')

@section('content')
    @include('components.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="well well-sm">
                    <form action="{{url('/nota/editar_nota/'.$nota->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                        <fieldset>
                            <legend class="text-center">Editar Nota</legend>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="{{$nota->nombre}}">
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
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{$nota->descripcion}}</textarea>
                                @error('descripcion')        
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Guardar cambios">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection