@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (isset($comprado)) 
            @if ($comprado == true)
            <div class="alert alert-success">
                ¡Producto comprado correctamente!
            </div>
            @else
            <div class="alert alert-warning">
                Error al comprar el producto - <strong>Error: </strong> {{$error}}
            </div>
            @endif
        @endif

        {!! Form::open(['action' => 'ECommerceController@comprarProducto', 'method' => 'POST']) !!}
        {!! Form::token() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idProducto', 'ID del producto') }}
                    {{ Form::text('idProducto', old('idProducto'), ['required', 'class' => 'form-control', 'placeholder' => '35']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('idCliente', 'ID del cliente') }}
                    {{ Form::text('idCliente', old('idCliente'), ['required', 'class' => 'form-control', 'placeholder' => '2384']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Cantidad', 'Cantidad') }}
                    {{ Form::text('Cantidad', old('Cantidad'), ['required', 'class' => 'form-control', 'placeholder' => '2384']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{ Form::submit('Comprar', ['class' => 'btn btn-success btn-fill']) }}
                <a href="{{ route('home') }}" class="btn btn-fill btn-info">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
