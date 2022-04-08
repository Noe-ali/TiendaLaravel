<?php

namespace App\Http\Controllers;
use App\Models\Admin\Producto;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return view('welcome',compact('producto'));
    }
}
