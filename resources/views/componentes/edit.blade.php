@extends('layouts.default')
@section('content')
    <h1>Editar componentes</h1>
    <a href="{{route('componentes.index')}}"><h3>Volver a componentes</h3></a>
    @if($exito)
        <p class="text-success">El componente se actualizó</p>
    @endif
    <form method="POST" action="{{ route('componentes.update',array('componentes'=>$componentes->id)) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label class="form-label">Nombre:</label>
            <input class="form-control" type="text" name="txtNombre" value="{{$componentes->nombre}}">
        </div>
        <div class="form-group">
            <label class="form-label">Descripcion:</label>
            <input class="form-control" type="text" name="txtDescripcion" value="{{$componentes->descripcion}}">
        </div>
        <div class="form-group">
            <label class="form-label">Imagen:</label>
            <input class="form-control" type="file" name="imagen" value="{{$componentes->imagen}}">
        </div>
        <div class="form-group">
            <label class="form-label">Precio:</label>
            <input class="form-control" type="text" name="txtPrecio" value="{{$componentes->precio}}">
        </div>
        <div class="form-group">
            <label class="form-label">Marca:</label>
            <input class="form-control" type="text" name="idMarca" value="{{$componentes->idMarca}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar componentes</button>
        </div>
    </form>
    <form method="POST" action="{{route('componentes.destroy',array('componentes'=>$componentes->id))}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Borrar componentes</button>
    </form>
@endsection
