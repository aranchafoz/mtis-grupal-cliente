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
                    @foreach($facturas as $factura)
                    <tr>
                        <td>{{$factura->idProducto}}</td>
                        <td>{{$factura->idCliente}}</td>
                        <td>{{$factura->Cantidad}}</td>
                        <td>
                        {!! Form::open(['action' => ['ECommerceController@borrarFactura',$factura->id], 'method' => 'DELETE']) !!}
                        {!! Form::token() !!}
                        {{ Form::submit('Borrar', ['class' => 'btn btn-success btn-fill']) }}
                        {!! Form::token() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop