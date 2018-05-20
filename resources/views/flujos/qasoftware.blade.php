@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (isset($resultado))
            @if ($resultado == true)
                <div class="alert alert-success">
                    ¡Informe generado!
                </div>
            @else
                <div class="alert alert-warning">
                    La petición no es válida - <strong>Error: </strong> {{$error}}
                </div>
            @endif
        @endif

        {!! Form::open(['action' => 'QASoftwareController@enviarPeticion', 'method' => 'POST']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idPeticion', 'ID de la Petición') }}
                    {{ Form::text('idPeticion', old('idPeticion'), ['required', 'class' => 'form-control', 'placeholder' => '15']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripción de la petición') }}
                    {{ Form::text('descripcion', old('descripcion'), ['required', 'class' => 'form-control', 'placeholder' => 'Cambios en frontend']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('departamento', 'Departamento destino') }}
                    {{ Form::text('departamento', old('departamento'), ['required', 'class' => 'form-control', 'placeholder' => 'Ventas']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('categoria', 'Categoría de la petición') }}
                    {{ Form::text('categoria', old('categoria'), ['required', 'class' => 'form-control', 'placeholder' => 'Calidad del software']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('lenguaje', 'Lenguaje del código a testear') }}
                    {{ Form::text('lenguaje', old('lenguaje'), ['required', 'class' => 'form-control', 'placeholder' => 'Java']) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                {{ Form::submit('Enviar', ['class' => 'btn btn-success btn-fill']) }}
                <a href="{{ route('home') }}" class="btn btn-fill btn-info">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
