@extends('adminlte::page')

@section('title', 'categoria')

@section('content_header')
   
Página de categoriaes y sus productos
@stop

@section('content')

<div class="card">
<div class="card-header">
 
        <a href="{{route('admin.categoria.create')}}" class="btn btn-primary">Nuevo Registro</a>
        <a class="btn btn-primary" href="{{route('categoria.pdf')}}">Generar Reporte</a>

      </div>

  <div class="card-body">

   <table id="categoriaes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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

    @foreach ($categoria as $categoria)
      <tr> 
      <td>{{$categoria->id}}</td> 
       <td>{{$categoria->nombre}}</td> 
       <td>{{$categoria->id_producto}}</td> 
       <td>{{$categoria->nombre_producto}}</td> 
       <td>{{$categoria->existencia}}</td> 
       <td>${{$categoria->precio}}.00</td> 
         
         
         <td width="10px">

         <a href="{{route('admin.categoria.edit',$categoria)}}"
class="btn btn-info btn-sm">Editar</a></td>
         
         <td width="10px">
            
             <form action="{{route('admin.categoria.destroy', $categoria)}}" method="POST">
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
        $('#categorias').DataTable();
} );
      </script>
@endsection

