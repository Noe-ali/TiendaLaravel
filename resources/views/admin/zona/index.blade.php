@extends('adminlte::page')

@section('title', 'zona')

@section('content_header')
   
Página de zonaes y sus proveedors
@stop

@section('content')

<div class="card">
<div class="card-header">
 
        <a href="{{route('admin.zona.create')}}" class="btn btn-primary">Nuevo Registro</a>
        <a class="btn btn-primary" href="{{route('zona.pdf')}}">Generar Reporte</a>

      </div>

  <div class="card-body">

   <table id="zonaes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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
@section('css')
    
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
        $('#zonas').DataTable();
} );
      </script>
@endsection

