<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoController extends Controller
{
    public function landing()
    {
        $productos = Productos::with('categoria')->orderBy('categoria_id')->get();
        $agrupar = $productos->groupBy(fn($p) => $p->categoria->nombre ?? 'Sin categoría')->sortKeys();


        return view('landing_page', compact('agrupar'));  
    }
}
