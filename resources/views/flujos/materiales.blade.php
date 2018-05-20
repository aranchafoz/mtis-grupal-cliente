@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{route('manufactura')}}" class="btn btn-info">Ver pedidos</a>
        </div>
        <div class="row">
            <h3>Materiales disponibles</h3>
          <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                  <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad disponible</th>
                    <th>Cantidad fabricación</th>
                </thead>
                <tbody>
                    @foreach($materiales as $material)
                    <tr>
                        <td>{{$material->id}}</td>
                        <td>{{$material->nombre}}</td>
                        <td>{{$material->cantidadDisponible}}</td>
                        <td>{{$material->cantidadFabricacion}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <h3>Pedidos de materiales</h3>
        <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
              <thead>
                <th>ID</th>
                <th>Material</th>
                <th>Cantidad</th>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->material}}</td>
                    <td>{{$pedido->cantidad}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop