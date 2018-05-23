@extends('layouts.default')
@section('content')
    <h1>Nueva marca</h1>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('marcas.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="txtNombre">
                </div>
                <div class="form-group">
                    <label class="form-label">Número telefónico:</label>
                    <input class="form-control" type="text" name="numerodetelefono">
                </div>               
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Agregar marcas</button>
                </div>
            </form>
        </div>
    </div>
@endsection

