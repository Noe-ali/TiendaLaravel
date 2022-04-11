<!DOCTYPE html>
<HTMl>
    <title> Reporte de Productos </title>

    <head>
        <style>
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;

            }

            td,th{
                border: 1px solid #dddddd;
                text-align :left;
                padding: 8px;
            }

            tr:nth-child(even){
                background-color: #dddddd;
            }



        </style>
        
    </head>
    <body>
        
    <h2>Reporte de categoriaes</h2>
    <table>
    <tr>
    <th>Id</th>
        <th>Nombre</th>
        <th>Id_Producto</th>
        <th>Nombre Producto</th>
        <th>Existencia</th>
        <th>Precio</th>
       
    </tr>

    @foreach ($categoria as $categoria)
      <tr> 
      <td>{{$categoria->id}}</td> 
       <td>{{$categoria->nombre}}</td> 
       <td>{{$categoria->id_producto}}</td> 
       <td>{{$categoria->nombre_producto}}</td> 
       <td>{{$categoria->existencia}}</td> 
       <td>{{$categoria->precio}}</td> 
      @endforeach
    </tr>
        </table>
    </body>
</HTMl>