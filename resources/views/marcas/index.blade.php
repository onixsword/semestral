@extends('layouts.default')
@section('content')
<h1>Marcas</h1>
@if($exito != null)
    @if($exito == 1)
        <p class="text-success">Se ha agregado una nueva marca</p>
    @else
        <p class="text-danger">No se ha podido agregar la marca</p>
    @endif
@endif 

@if($borrado != null)
    @if($borrado == 1)
        <p class="text-success">Se ha borrado una marca</p>
    @else
        <p  class="text-danger">No se ha podido borrar la marca</p>
    @endif
@endif 

<a href="{{route('marcas.create')}}">
    <button class="btn btn-primary">Agregar marca</button>
</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Número de Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($marcas as $marca)
            <tr>
                <td>{{$marca->nombre}}</td>                
                <td>{{$marca->numerodetelefono}}</td>                
                <td>
                    <a href="{{route('marcas.edit',$marca->id)}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection