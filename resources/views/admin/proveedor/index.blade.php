@extends('adminlte::page')

@section('title', 'proveedor')

@section('content_header')
   
Página de proveedores y sus productos
@stop

@section('content')

<div class="card">
<div class="card-header">
 
        <a href="{{route('admin.proveedor.create')}}" class="btn btn-primary">Nuevo Registro</a>
        <a class="btn btn-primary" href="{{route('proveedor.pdf')}}">Generar Reporte</a>

      </div>

  <div class="card-body">

   <table id="proveedores" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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
       <td>${{$proveedor->precio}}.00</td> 
         
         
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
@section('css')
    
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
        $('#proveedors').DataTable();
} );
      </script>
@endsection

