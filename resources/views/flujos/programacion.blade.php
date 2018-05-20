@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (isset($moved)) 
            @if ($moved == true)
            <div class="alert alert-success">
                ¡Panel movido correctamente!
            </div>
            @else
            <div class="alert alert-warning">
                ¡Error al mover el panel de posición!
            </div>
            @endif
        @endif

        {!! Form::open(['action' => 'ProgramacionController@movePanel', 'method' => 'POST']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('panel_value', 'Nuevo valor (comprendido entre 9 y 15)') }}
                    {{ Form::text('panel_value', old('panel_value'), ['required', 'class' => 'form-control', 'placeholder' => '11']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{ Form::submit('Mover panel', ['class' => 'btn btn-success btn-fill']) }}
                <a href="{{ route('home') }}" class="btn btn-fill btn-info">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
