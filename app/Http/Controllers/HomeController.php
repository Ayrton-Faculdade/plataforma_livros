<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $livros = Livros::all();
        foreach($livros as $key=>$livro){
            $usuario = User::find($livro->user_id);
            $livro->nome_usuario = "{$usuario->name} {$usuario->sobrenome}";
            $categoria = Livros::find($livro->id)->getCategoria;
            $livro->categoria = $categoria->nome;
            $livros[$key]=$livro;




        }
        return view('home',[
            'livros' => $livros,

        ]);
    }
}
