<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $validado = Validator::make($request->all(),[
            'nome'=>['required','max:255'],
            'autor'=>['required'],
            'ano'=>['required','numeric'],
            'edicao'=>['required','numeric'],
            'editora'=>['required'],
            'isbn'=>['required','numeric'],
            'categoria'=>['required','numeric'],
            'tipo'=>['required','numeric'],
            'descricao'=>['required'],
            'capa'=>['nullable','image'],
        ]);

        if($validado->fails()){
            return redirect('livros/adicionar')
                ->withErrors($validado)
                ->withInput();
        }

        $path='';
        if(!empty($request->file('capa'))){
            $path = $request->file('capa')->store('capas','public');
        }

        $save = [
            'user_id'=>Auth::user()->id,
            'nome'=> $request->post('nome'),
            'autor'=> $request->post('autor'),
            'ano'=> $request->post('ano'),
            'edicao'=> $request->post('edicao'),
            'editora'=> $request->post('editora'),
            'isbn'=> $request->post('isbn'),
            'categoria'=> $request->post('categoria'),
            'tipo'=> $request->post('tipo'),
            'descricao'=> $request->post('descricao'),
            'capa'=> $path,
        ];


        $livrosModel= new Livros($save);

        $id = $livrosModel->save();

        if(empty($id)){
            return redirect('livros/adicionar')
                ->withErrors(['msg' => 'Não foi possivel salvar esse livro no banco de dados']);
        }

        return redirect('/home')->with('sucesso','Livro salvo com sucesso!');
    }
}
