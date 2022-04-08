<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ProductosController;
use App\Http\Controllers\admin\ProveedoresController;
use App\Http\Controllers\CartController;


Route::get('admin', [InicioController::class, 'index']);



Route::resource('admin/cliente', ClienteController::class)->names('admin.cliente');
Route::resource('admin/producto', ProductosController::class)->names('admin.producto');
Route::resource('admin/proveedor', ProveedoresController::class)->names('admin.proveedor');
Route::get('/producto/pdf', [ProductosController::class, 'createPDF'])->name('producto.pdf');
Route::get('/proveedor/pdf', [ProveedoresController::class, 'createPDF'])->name('proveedor.pdf');




