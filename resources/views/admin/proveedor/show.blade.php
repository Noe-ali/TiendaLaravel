@extends('adminlte::page')

@section('title', 'Mostrar')

@section('content_header')
   
Mostrar proveedors 
@stop

@section('content')

<div class="card">
<div class="card-body">

   <table class="table table-striped">
  <thead>
      <tr>
      <th>Id</th>
        <th>Nombre</th>
        <th>Id_Producto</th>
        <th>Nombre Producto</th>
        <th>Existencia</th>
        <th>Precio</th>
         <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($proveedor as $proveedor)
      <tr> 
      <td>{{$proveedor->id}}</td> 
       <td>{{$proveedor->nombre}}</td> 
       <td>{{$proveedor->id_producto}}</td> 
       <td>{{$proveedor->nombre_producto}}</td> 
       <td>{{$proveedor->existencia}}</td> 
       <td>{{$proveedor->precio}}</td> 
         
         <td width="10px">

         <a href="{{route('admin.proveedor.edit',$proveedor)}}"
class="btn btn-info btn-sm">Editar</a></td>
         
         <td width="10px">
            
             <form action="{{route('admin.proveedor.destroy', $proveedor)}}" method="POST">
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