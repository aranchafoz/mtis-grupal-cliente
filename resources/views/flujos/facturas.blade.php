@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{route('ecommerce')}}" class="btn btn-info">Ver productos</a>
        </div>
        <div class="row">
            <h3>Facturas</h3>
          <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                  <thead>
                    <th>ID Producto</th>
                    <th>ID Cliente</th>
                    <th>Cantidad</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach($facturas as $facturas)
                    <tr>
                        <td>{{$facturas->idProducto}}</td>
                        <td>{{$facturas->idCliente}}</td>
                        <td>{{$facturas->Cantidad}}</td>
                        <td>
                           <a href="">Borrar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop