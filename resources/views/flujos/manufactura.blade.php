@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{route('materiales')}}" class="btn btn-info">Ver materiales</a>
        </div>
        <div class="row">
            <h3>Pedidos de paneles</h3>
          <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                  <thead>
                    <th>ID</th>
                    <th>Paneles encargados</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($paneles as $panel)
                    <tr>
                        <td>{{$panel->id}}</td>
                        <td>{{$panel->panelesEncargados}}</td>
                        <td>{{$panel->estado}}</td>
                        <td>{{$panel->cliente}}</td>
                        <td>
                            {!! Form::open(['action' => ['ManufacturaController@actualizarPedido', $panel->id], 'method' => 'POST']) !!}
                            {!! Form::token() !!}
                                {{ Form::submit('Actualizar pedido', ['class' => 'btn btn-success btn-fill']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@stop
