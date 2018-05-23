@extends('layouts.default')
@section('content')
    <h1>Nuevo componente</h1>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('componentes.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="txtNombre">
                </div>
                <div class="form-group">
                    <label class="form-label">Descripcion:</label>
                    <input class="form-control" type="text" name="txtDescripcion">
                </div>
                <div class="form-group">
                    <label class="form-label">Imagen:</label>
                    <input class="form-control" type="file" name="imagen">
                </div>
                <div class="form-group">
                    <label class="form-label">Precio:</label>
                    <input class="form-control" type="text" name="txtPrecio">
                </div>
                <div class="form-group">
                    <label class="form-label">Marca:</label>
                    <input class="form-control" type="text" name="idMarca">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Agregar componentes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

