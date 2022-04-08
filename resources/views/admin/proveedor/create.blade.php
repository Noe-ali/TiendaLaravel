@extends('adminlte::page')

@section('title', 'Create')

@section('content_header')
    <h1>Nuevo proveedor</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.proveedor.store')}}" method="POST">
    @csrf
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
</div>

 <div class="mb-3">


     <label for="producto" class="form-label">Producto asociado</label>
     <select name="producto" id="producto" class="form-control">
   @foreach ($producto as $producto)
<option value="{{$producto->id}}">{{$producto->id}} - {{$producto->nombre}}</option>
@endforeach
</select>
</div>

    
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</form>
  </div>
</div>
@stop