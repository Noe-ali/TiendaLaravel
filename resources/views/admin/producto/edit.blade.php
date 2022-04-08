@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Editar un producto</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.producto.update', $producto)}}" method="POST">
    @csrf
    @method('put')
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required value="{{$producto->nombre}} ">
</div>

 <div class="mb-3">
     <label for="apellidop" class="form-label">descripcion</label>
     <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{$producto->descripcion}}">
</div>

 <div class="mb-3">
     <label for="apellidom" class="form-label">precio</label>
    <input type="number" class="form-control" id="precio" name="precio" value="{{$producto->precio}}" required>
    </div>

 <div class="mb-3">
    <label for="edad" class="form-label">Edad:</label>
    <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{$producto->cantidad}}" required>
    </div>
  
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</form>
  </div>
</div>
@stop