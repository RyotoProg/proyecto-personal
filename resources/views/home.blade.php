@extends('layouts.app')

@section('title', 'Notas')

@section('content')
    @include('components.nav')

    @if(session()->has('success'))
    <div class="float-right mt-3 mr-2">
        <div class="alert alert-success alert-dismissible fade show d-inline" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="container">

        <h3 class="mt-3 mb-2">Notas</h3>
        <div class="grid">
            <div class="row">
            @foreach($notas as $nota)
                <div class="col-md-3 p-3">
                    <div class="card btn" role="button" data-toggle="modal" data-target="{{'#'.'contentModal'.$nota->id}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$nota->nombre}}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="{{'deleteModal'.$nota->id}}" tabindex="-1" role="dialog" aria-labelledby="{{'deleteModalLabel'.$nota->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{'deleteModalLabel'.$nota->id}}">¿Estas seguro de elimniar?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$nota->nombre}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <form action="{{url('/nota/delete_nota/'.$nota->id)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="{{'contentModal'.$nota->id}}" tabindex="-1" role="dialog" aria-labelledby="{{'contentModalLabel'.$nota->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{'contentModalLabel'.$nota->id}}">{{$nota->nombre}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$nota->descripcion}}
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('/nota/edit/'.$nota->id)}}" class="btn btn-primary">Editar</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="{{'#'.'deleteModal'.$nota->id}}">Eliminar</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <h3 class="mt-3 mb-2">Links</h3>
        <div class="grid">
            <div class="row">
                @foreach($links as $link)
                <div class="col-md-3 p-3">
                    <div class="card">
                            <a href="{{url($link->link)}}" class="card-body text-dark" target="_blank">
                                {{$link->nombre}}
                            </a>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{url('/link/edit/'.$link->id)}}">Editar</a>
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="{{'#'.'deleteLinkModal'.$link->id}}">Eliminar</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="{{'deleteLinkModal'.$link->id}}" tabindex="-1" role="dialog" aria-labelledby="{{'deleteLinkModalLabel'.$link->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{'deleteLinkModalLabel'.$link->id}}">¿Estas seguro de elimniar?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$link->nombre}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <form action="{{url('/link/delete_link/'.$link->id)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection