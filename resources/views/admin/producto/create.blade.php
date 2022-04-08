@extends('adminlte::page')

@section('title', 'Create')

@section('content_header')
    <h1>Nuevo producto</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.producto.store')}}" method="POST">
    @csrf
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
</div>

 <div class="mb-3">
     <label for="apellidop" class="form-label">Descripción</label>
     <input type="text" class="form-control" id="descripcion" name="descripcion">
</div>

 <div class="mb-3">
     <label for="apellidom" class="form-label">cantidad</label>
    <input type="number" class="form-control" id="cantidad" name="cantidad">
    </div>

 <div class="mb-3">
    <label for="edad" class="form-label">Precio:</label>
    <input type="number" class="form-control" id="precio" name="precio">
    </div>
    
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</form>
  </div>
</div>
@stop