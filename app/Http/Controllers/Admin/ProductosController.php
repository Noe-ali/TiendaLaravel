<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use PDF;


class ProductosController extends Controller
{
    public function index()
    {

    $producto = Producto::all();
    

      return view('admin.producto.index',compact('producto'));


    }

    public function create()
    {
      return view('admin.producto.create');
    }


/**
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $producto=new Producto();
       

      $request->validate([
          'nombre'=>'required',
          'descripcion'=>'required',
          'cantidad'=>'required',
          'precio'=>'required',
      ]);
       $producto->nombre=$request->nombre;
       $producto->descripcion=$request->descripcion;
       $producto->cantidad=$request->cantidad;
       $producto->precio=$request->precio;
      
       $producto->save();

       return redirect()->route('admin.producto.show',$producto);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
      $producto = Producto::all();

      return view('admin.producto.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        //return $producto;
        // $producto->save();
        return view('admin.producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //return $request->all();
        $request->validate([
          'nombre'=>'required',
          'descripcion'=>'required',
          'cantidad'=>'required',
          'precio'=>'required',
      ]);
        $producto->nombre=$request->nombre;
       $producto->descripcion=$request->descripcion;
       $producto->cantidad=$request->cantidad;
       $producto->precio=$request->precio;

        //return $producto;
        
        $producto->save();
         return redirect()->route('admin.producto.show',$producto);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
         return redirect()->route('admin.producto.show',$producto);

    }

    public function createPDF()
    {
        $producto = Producto::all();
        view()->share('producto', $producto);
        $pdf = PDF::loadView('reporte',compact('producto'));
        return $pdf->download('reporte.pdf');

    }
}
