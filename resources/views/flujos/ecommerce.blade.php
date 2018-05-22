@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{route('facturas')}}" class="btn btn-info">Ver facturas</a>
            <a href="{{route('comprar')}}" class="btn btn-info">Comprar producto</a>
        </div>
        <div class="row">
            <h3>Productos disponibles</h3>
          <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                  <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad disponible</th>
                    <th>Cantidad fabricación</th>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->Nombre}}</td>
                        <td>{{$producto->Cantidad}}</td>
                        <td>{{$producto->PrecioU}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop