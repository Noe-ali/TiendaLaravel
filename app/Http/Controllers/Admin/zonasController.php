<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Proveedores;
use App\Models\zonas;
use PDF;
use Illuminate\Http\Request;

class zonasController extends Controller
{
    public function index()
    {

    $zona = zonas::join("proveedores", "proveedores.id", "=", "zonas.proveedor_id")
      ->select("zonas.id as id", "zonas.ciudad as ciudad", "proveedores.id as id_proveedor", "proveedores.nombre as nombre_proveedor")
      ->get();
    

      return view('admin.zona.index',compact('zona'));


    }

    public function create()
    {
      $proveedor = Proveedores::all();
    

     
      return view('admin.zona.create',compact('proveedor'));
    }


/**
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $zona=new zonas();
       

      $request->validate([
          'ciudad'=>'required',
          'proveedor'=>'required',

      ]);
       $zona->ciudad=$request->ciudad;
       $zona->proveedor_id=$request->proveedor;
       $zona->save();

       return redirect()->route('admin.zona.show',$zona);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
      $zona = zonas::join("proveedores", "proveedores.id", "=", "zonas.proveedor_id")
      ->select("zonas.id as id", "zonas.ciudad as ciudad", "proveedores.id as id_proveedor", "proveedores.nombre as nombre_proveedor")
      ->get();
    

      return view('admin.zona.show',compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $proveedor = Proveedores::all();
    

     
     
        $zona = zonas::find($id);
        //return $zona;
        // $zona->save();
        return view('admin.zona.edit', compact('zona','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, zonas $zona)
    {
        //return $request->all();
        $request->validate([
          'ciudad'=>'required',
          'proveedor'=>'required',
 
      ]);
        $zona->ciudad=$request->ciudad;
       $zona->proveedor_id=$request->proveedor;
       

        //return $zona;
        
        $zona->save();
         return redirect()->route('admin.zona.show',$zona);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = zonas::find($id);
        $zona->delete();
         return redirect()->route('admin.zona.show',$zona);

    }

    public function createPDF()
    {
      $zona = zonas::join("proveedores", "proveedores.id", "=", "zonas.proveedor_id")
      ->select("zonas.id as id", "zonas.ciudad as ciudad", "proveedores.id as id_proveedor", "proveedores.nombre as nombre_proveedor")
      ->get();
        view()->share('zona', $zona);
        $pdf = PDF::loadView('reporte4',compact('zona'));
        return $pdf->download('reporte.pdf');

    }
}
