<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function formulario(Request $request)
    {
        $categorias = Categorias::all();
        return view('livros/adicionar',[
            'categorias'=>$categorias,
        ]);
    }

    public function save(Request $request)
    {

    }
}
