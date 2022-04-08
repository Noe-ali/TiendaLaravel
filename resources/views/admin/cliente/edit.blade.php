@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Editar un cliente</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.cliente.update', $cliente)}}" method="POST">
    @csrf
    @method('put')
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->nombre}}">
</div>

 <div class="mb-3">
     <label for="apellidop" class="form-label">Apellido Paterno:</label>
     <input type="text" class="form-control" id="apellido_p" name="apellido_p" value="{{$cliente->Apellido_p}}">
</div>

 <div class="mb-3">
     <label for="apellidom" class="form-label">Apellido Materno:</label>
    <input type="text" class="form-control" id="apellido_m" name="apellido_m" value="{{$cliente->Apellido_m}}">
    </div>

 <div class="mb-3">
    <label for="edad" class="form-label">Edad:</label>
    <input type="text" class="form-control" id="edad" name="edad" value="{{$cliente->edad}}">
    </div>
    <div class="mb-3">
    <label for="edad" class="form-label">Dirección de Correo:</label>
    <input type="text" class="form-control" id="correo" name="correo" value="{{$cliente->email}}">
    </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</form>
  </div>
</div>
@stop