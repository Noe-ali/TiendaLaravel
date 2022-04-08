@extends('adminlte::page')

@section('title', 'Mostrar')

@section('content_header')
   
Mostrar productos 
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

    @foreach ($producto as $producto)
      <tr> 
      <td>{{$producto->id}}</td> 
      <td>{{$producto->nombre}}</td> 
      <td>{{$producto->descripcion}}</td> 
      <td>{{$producto->cantidad}}</td> 
      <td>{{$producto->precio}}</td> 
         
         <td width="10px">

         <a href="{{route('admin.producto.edit',$producto)}}"
class="btn btn-info btn-sm">Editar</a></td>
         
         <td width="10px">
            
             <form action="{{route('admin.producto.destroy', $producto)}}" method="POST">
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