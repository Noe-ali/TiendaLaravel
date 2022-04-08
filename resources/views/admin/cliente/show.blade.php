@extends('adminlte::page')

@section('title', 'Mostrar')

@section('content_header')
   
Mostrar Clientes 
@stop

@section('content')

<div class="card">
<div class="card-body">

   <table class="table table-striped">
  <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Edad </th>
         <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($cliente as $cliente)
      <tr> 
      <td>{{$cliente->id}}</td> 
      <td>{{$cliente->nombre}}</td> 
      <td>{{$cliente->Apellido_p}}</td> 
      <td>{{$cliente->Apellido_m}}</td> 
      <td>{{$cliente->edad}}</td> 
         
         <td width="10px">

         <a href="{{route('admin.cliente.edit',$cliente)}}"
class="btn btn-info btn-sm">Editar</a></td>
         
         <td width="10px">
            
             <form action="{{route('admin.cliente.destroy', $cliente)}}" method="POST">
                 @method('delete')
                 @csrf
                 <input type="submit" value="Eliminar" class="btn btn-danger">
             </form>

         </td>
     </tr>
      @endforeach
  </tbody>
</table>

  </div>

</div>
@stop