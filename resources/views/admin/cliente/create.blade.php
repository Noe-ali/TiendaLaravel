@extends('adminlte::page')

@section('title', 'Create')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.cliente.store')}}" method="POST">
    @csrf
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
</div>

 <div class="mb-3">
     <label for="apellidop" class="form-label">Apellido Paterno:</label>
     <input type="text" class="form-control" id="apellidop" name="apellidop">
</div>

 <div class="mb-3">
     <label for="apellidom" class="form-label">Apellido Materno:</label>
    <input type="text" class="form-control" id="apellidom" name="apellidom">
    </div>

 <div class="mb-3">
    <label for="edad" class="form-label">Edad:</label>
    <input type="text" class="form-control" id="edad" name="edad">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Dirección de Correo:</label>
    <input type="email" class="form-control" id="correo" name="correo">
    </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</form>
  </div>
</div>
@stop