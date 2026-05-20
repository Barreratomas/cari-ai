<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/reporte', function (Request $request) {
    $filtroProducto = $request->input('producto');
    $filtroCliente  = $request->input('cliente');

    $query = DB::table('orders as o')
        ->join('clients as c',  'o.client_id',  '=', 'c.id')
        ->join('products as p', 'o.product_id', '=', 'p.id')
        ->select('p.name as producto', 'p.reference as referencia',
                 'c.name as cliente', 'c.last_name as apellido',
                 'o.quantity as cantidad', 'o.total');

    if ($filtroProducto) $query->where('p.name', 'like', "%$filtroProducto%");
    if ($filtroCliente)  $query->where('c.name',  'like', "%$filtroCliente%");

    $ordenes   = $query->get();
    $productos = DB::table('products')->pluck('name');
    $clientes  = DB::table('clients')->pluck('name');

    return response()->view('reporte', compact('ordenes', 'productos', 'clientes',
                                   'filtroProducto', 'filtroCliente'))
                     ->header('Content-Type', 'text/html; charset=utf-8');
});