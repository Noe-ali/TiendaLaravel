<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Producto;
use App\Models\categorias;
use PDF;
class categoriasController extends Controller
{
  public function index()
  {

  $categoria = categorias::join("productos", "productos.id", "=", "categorias.producto_id")
    ->select("categorias.id as id", "categorias.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
    ->get();
  

    return view('admin.categoria.index',compact('categoria'));


  }

  public function create()
  {
    $producto = Producto::all();
  

   
    return view('admin.categoria.create',compact('producto'));
  }


/**
  * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $categoria=new categorias();
     

    $request->validate([
        'nombre'=>'required',
        'producto'=>'required',

    ]);
     $categoria->nombre=$request->nombre;
     $categoria->producto_id=$request->producto;
     $categoria->save();

     return redirect()->route('admin.categoria.show',$categoria);

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

  
    $categoria = categorias::join("productos", "productos.id", "=", "categorias.producto_id")
    ->select("categorias.id as id", "categorias.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
    ->get();
  

    return view('admin.categoria.show',compact('categoria'));
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
  

   
   
      $categoria = categorias::find($id);
      //return $categoria;
      // $categoria->save();
      return view('admin.categoria.edit', compact('categoria','producto'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, categorias $categoria)
  {
      //return $request->all();
      $request->validate([
        'nombre'=>'required',
        'producto'=>'required',

    ]);
    $categoria = categorias::find($request->id);


      $categoria->nombre=$request->nombre;
      $categoria->producto_id=$request->producto;
     

      //return $categoria;
      $categoria->save();
       return redirect()->route('admin.categoria.show', $categoria);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $categoria = categorias::find($id);
      $categoria->delete();
       return redirect()->route('admin.categoria.show',$categoria);

  }

  public function createPDF()
  {
    $categoria = categorias::join("productos", "productos.id", "=", "categorias.producto_id")
    ->select("categorias.id as id", "categorias.nombre as nombre", "productos.id as id_producto", "productos.nombre as nombre_producto", "productos.cantidad as existencia", "productos.precio as precio")
    ->get();
      view()->share('categoria', $categoria);
      $pdf = PDF::loadView('reporte3',compact('categoria'));
      return $pdf->download('reporte.pdf');

  }
 
}


