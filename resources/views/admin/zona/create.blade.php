@extends('adminlte::page')

@section('title', 'Create')

@section('content_header')
    <h1>Nuevo zona</h1>
@stop

@section('content')
    <div class="card">
  <div class="card-body">
<form action="{{route('admin.zona.store')}}" method="POST">
    @csrf
  <div class="mb-3">

    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad">
</div>

 <div class="mb-3">


     <label for="proveedor" class="form-label">proveedor asociado</label>
     <select name="proveedor" id="proveedor" class="form-control">
   @foreach ($proveedor as $proveedor)
<option value="{{$proveedor->id}}">{{$proveedor->id}} - {{$proveedor->nombre}}</option>
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