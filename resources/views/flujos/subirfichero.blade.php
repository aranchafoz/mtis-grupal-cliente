@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        {!! Form::open(['action' => 'SubidaArchivosController@enviarFichero', 'method' => 'POST']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idWorker', 'ID de Empleado') }}
                    {{ Form::text('idWorker', old('idWorker'), ['required', 'class' => 'form-control', 'placeholder' => '2384']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idOffice', 'ID de Oficina destino') }}
                    {{ Form::text('idOffice', old('idOffice'), ['required', 'class' => 'form-control', 'placeholder' => '2384']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idDepartment', 'ID de Departamento destino') }}
                    {{ Form::text('idDepartment', old('idDepartment'), ['required', 'class' => 'form-control', 'placeholder' => '2384']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('extension', 'Extensión del archivo (txt, doc, pdf)') }}
                    {{ Form::text('extension', old('extension'), ['required', 'class' => 'form-control', 'placeholder' => 'txt']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('content', 'Contenido del documento') }}
                    {{ Form::textarea('content', old('content'), ['required', 'class' => 'form-control', 'placeholder' => 'Lorem ipsum']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('date', 'Fecha de expedición del documento') }}
                    {{ Form::date('date', old('date'), ['required', 'class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{ Form::submit('Subir archivo', ['class' => 'btn btn-success btn-fill']) }}
                <a href="{{ route('home') }}" class="btn btn-fill btn-info">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
