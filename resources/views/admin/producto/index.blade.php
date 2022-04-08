@extends('adminlte::page')

@section('title', 'producto')

@section('content_header')
   
Página de Productos 
@stop

@section('content')

<div class="card">
<div class="card-header">
 
        <a href="{{route('admin.producto.create')}}" class="btn btn-primary">Nuevo Registro</a>
        <a class="btn btn-primary" href="{{route('producto.pdf')}}">Generar Reporte</a>

      </div>

  <div class="card-body">

   <table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
  <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Cantidad </th>
         <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($producto as $producto)
      <tr> 
      <td>{{$producto->id}}</td> 
       <td>{{$producto->nombre}}</td> 
        <td>{{$producto->descripcion}}</td> 
        <td>{{$producto->precio}}</td> 
        <td>{{$producto->cantidad}}</td> 
         
         
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
@section('css')
    
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
        $('#productos').DataTable();
} );
      </script>
@endsection

