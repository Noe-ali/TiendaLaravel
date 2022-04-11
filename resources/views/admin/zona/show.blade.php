@extends('adminlte::page')

@section('title', 'Mostrar')

@section('content_header')
   
Mostrar zonas 
@stop

@section('content')

<div class="card">
<div class="card-body">

   <table class="table table-striped">
  <thead>
      <tr>
      <th>Id</th>
        <th>Nombre</th>
        <th>Id_proveedor</th>
        <th>Nombre proveedor</th>
         <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($zona as $zona)
      <tr> 
      <td>{{$zona->id}}</td> 
       <td>{{$zona->ciudad}}</td> 
       <td>{{$zona->id_proveedor}}</td> 
       <td>{{$zona->nombre_proveedor}}</td> 
       <td>{{$zona->existencia}}</td> 
       <td>{{$zona->precio}}</td> 
         
         <td width="10px">

         <a href="{{route('admin.zona.edit',$zona)}}"
class="btn btn-info btn-sm">Editar</a></td>
         
         <td width="10px">
            
             <form action="{{route('admin.zona.destroy', $zona)}}" method="POST">
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