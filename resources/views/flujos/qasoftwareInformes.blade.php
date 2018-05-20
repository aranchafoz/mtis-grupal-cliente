@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($informes as $informe)
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Informe número {{$informe->idInforme}}</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <p>{{$informe->departamento}}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <p>{{$informe->categoria}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Errores</label>
                                    @if($informe->error)
                                    <p>Si</p>
                                    @else
                                    <p>No</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción errores</label>
                                    @if($informe->error)
                                        <p>{{$informe->descripcionError}}</p>
                                    @else
                                        <p>No se han encontrado errores.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de creación</label>
                                    <p>{{$informe->fecha}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


@stop
