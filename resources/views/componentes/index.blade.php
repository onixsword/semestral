@extends('layouts.default')
@section('content')
<h1>Componentes</h1>
@if($exito != null)
    @if($exito == 1)
        <p class="text-success">Se ha agregado un nuevo componente</p>
    @else
        <p class="text-danger">No se ha podido agregar el componente</p>
    @endif
@endif 

@if($borrado != null)
    @if($borrado == 1)
        <p class="text-success">Se ha borrado un componente</p>
    @else
        <p  class="text-danger">No se ha podido borrar el componente</p>
    @endif
@endif 

<a href="{{route('componentes.create')}}">
    <button class="btn btn-primary">Agregar componente</button>
</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($componentes as $componente)
            <tr>
                <td>{{$componente->nombre}}</td>
                <td><img href="{{$componente->imagen}}"></img></td>
                <td>{{$componente->descripcion}}</td>
                <td>{{$componente->precio}}</td>
                <td>{{$componente->idMarca}}</td>
                <td>
                    <a href="{{route('componentes.edit',$componente->id)}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection