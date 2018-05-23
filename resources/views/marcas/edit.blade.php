@extends('layouts.default')
@section('content')
    <h1>Editar marcas</h1>
    <a href="{{route('marcas.index')}}"><h3>Volver a marcas</h3></a>
    @if($exito)
        <p class="text-success">La marca se actualizó</p>
    @endif
    <form method="POST" action="{{ route('marcas.update',array('marcas'=>$marcas->id)) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label class="form-label">Nombre:</label>
            <input class="form-control" type="text" name="txtNombre" value="{{$marcas->nombre}}">
        </div>
        <div class="form-group">
            <label class="form-label">Número de teléfono:</label>
            <input class="form-control" type="text" name="numerodetelefono" value="{{$marcas->numerodetelefono}}">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar marcas</button>
        </div>
    </form>
    <form method="POST" action="{{route('marcas.destroy',array('marcas'=>$marcas->id))}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Borrar marcas</button>
    </form>
@endsection
