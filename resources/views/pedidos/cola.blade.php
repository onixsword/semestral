@extends('layouts.default')

@section('content')
    <h1>Pedidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Elementos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{$correos[$pedido->idUsuario]}}</td>
                    <td>
                        @foreach($pedido["elementos"] as $elemento)
                            {{ $elemento->cantidad ." - ". $elemento->nombreComida}} <br/>
                        @endforeach
                    </td>
                    <td>
                        @if($pedido->idEstadoPedido == 1)
                            <a href="{{route('pedidos.preparar',$pedido->id)}}">
                                <button class="btn btn-primary">Preparar</button>
                            </a>
                        @elseif($pedido->idEstadoPedido == 2)
                            Preparando..
                        @endif
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection