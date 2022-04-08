<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $cliente = Cliente::all();
    //return $cliente;

      return view('admin.cliente.index',compact('cliente'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nombre'=>'required',
        'apellidop'=>'required',
        'apellidom'=>'required',
        'edad'=>'required',
        'correo'=>'required',
    ]);
      $cliente=new Cliente();

       $cliente->nombre=$request->nombre;
       $cliente->Apellido_p=$request->apellidop;
       $cliente->Apellido_m=$request->apellidom;
       $cliente->edad=$request->edad;
       $cliente->email=$request->correo;
       $cliente->save();

       return redirect()->route('admin.cliente.show',$cliente);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    
      $cliente = Cliente::all();

      return view('admin.cliente.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        //return $cliente;
        // $cliente->save();
        return view('admin.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //return $request->all();

        $request->validate([
          'nombre'=>'required',
          'apellido_p'=>'required',
          'apellido_m'=>'required',
          'edad'=>'required',
          'correo'=>'required',
      ]);
        $cliente->nombre=$request->nombre;
        $cliente->Apellido_p=$request->apellido_p;
        $cliente->Apellido_m=$request->apellido_m;
        $cliente->edad=$request->edad;
        $cliente->email=$request->correo;

        //return $cliente;
        
        $cliente->save();
         return redirect()->route('admin.cliente.show',$cliente);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
         return redirect()->route('admin.cliente.show',$cliente);

    }
}
