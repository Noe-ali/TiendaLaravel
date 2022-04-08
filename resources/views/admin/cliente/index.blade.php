@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
   
Página de Clientes 
@stop

@section('content')

<div class="card">
<div class="card-header">

        <a href="{{route('admin.cliente.create')}}" class="btn btn-primary">Nuevo Registro</a></div>
          
  <div class="card-body">

   <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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
@section('css')
    
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $(document).ready(function() {
        $('#clientes').DataTable();
} );
      </script>
@endsection

