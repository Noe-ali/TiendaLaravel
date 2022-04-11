<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedores;

use App\Models\Admin\Producto;
use PDF;

class ProveedoresController extends Controller
{
    public function index()
    {

    $proveedor = proveedores::join("productos", "productos.id", "=", "proveedores.producto_id")
      ->select("proveedores.id as id", "proveedores.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
      ->get();
    

      return view('admin.proveedor.index',compact('proveedor'));


    }

    public function create()
    {
      $producto = Producto::all();
    

     
      return view('admin.proveedor.create',compact('producto'));
    }


/**
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proveedor=new proveedores();
       

      $request->validate([
          'nombre'=>'required',
          'producto'=>'required',

      ]);
       $proveedor->nombre=$request->nombre;
       $proveedor->producto_id=$request->producto;
       $proveedor->save();

       return redirect()->route('admin.proveedor.show',$proveedor);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
      $proveedor = proveedores::join("productos", "productos.id", "=", "proveedores.producto_id")
      ->select("proveedores.id as id", "proveedores.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
      ->get();
    

      return view('admin.proveedor.show',compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $producto = Producto::all();
    

     
     
        $proveedor = proveedores::find($id);
        //return $proveedor;
        // $proveedor->save();
        return view('admin.proveedor.edit', compact('proveedor','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedores $proveedor)
    {
        //return $request->all();
        $request->validate([
          'nombre'=>'required',
          'producto'=>'required',
 
      ]);
        $proveedor->nombre=$request->nombre;
       $proveedor->producto_id=$request->producto;
       

        //return $proveedor;
        
        $proveedor->save();
         return redirect()->route('admin.proveedor.show',$proveedor);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = proveedores::find($id);
        $proveedor->delete();
         return redirect()->route('admin.proveedor.show',$proveedor);

    }

    public function createPDF()
    {
      $proveedor = proveedores::join("productos", "productos.id", "=", "proveedores.producto_id")
      ->select("proveedores.id as id", "proveedores.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
      ->get();
        view()->share('proveedor', $proveedor);
        $pdf = PDF::loadView('reporte2',compact('proveedor'));
        return $pdf->download('reporte.pdf');

    }
   
}
