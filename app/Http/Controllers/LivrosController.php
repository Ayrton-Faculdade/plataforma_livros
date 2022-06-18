<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LivrosController extends Controller{

    public function formulario(Request $request){
        $categorias = Categorias::all();
        return view('livros/adicionar',[
            'categorias'=>$categorias,
        ]);
    }

    public function save(Request $request){
        $validado = Validator::make($request->all(),[
            'nome'=>['required','max:255'],
            'autor'=>['required'],
            'ano'=>['required','numeric'],
            'edicao'=>['required','numeric'],
            'editora'=>['required'],
            'isbn'=>['required'],
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


    public function show($id){
        $livro = Livros::findOrFail($id);
        return view('livros/mostrar',[
            'livro'=>$livro,
        ]);
    }

    public function edit($id){
        $livro = Livros::findOrFail($id);
        $categorias = Categorias::all();
        if(auth()->user()->id == $livro->user_id){
            return view('livros/editar',[
                'livro'=>$livro,
                'categorias'=>$categorias,
            ]);
        }else{
            return redirect('home')
                ->withErrors(['msg' => 'Não é possível alterar um livro que não é seu']);
        }
    }

    /*

    public function update(Request $request, $id){
        $validado = Validator::make($request->all(),[
            'nome'=>['required','max:255'],
            'autor'=>['required'],
            'ano'=>['required','numeric'],
            'edicao'=>['required','numeric'],
            'editora'=>['required'],
            'isbn'=>['required'],
            'categoria'=>['required','numeric'],
            'tipo'=>['required','numeric'],
            'descricao'=>['required'],
            'capa'=>['nullable','image'],
        ]);

        if($validado->fails()){
            return redirect("livros/$id/editar")
                ->withErrors($validado)
                ->withInput();
        }

        $path='';
        if(!empty($request->file('capa'))){
            $path = $request->file('capa')->store('capas','public');
        }

        $save = [
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

        Livros::where(['id'=>$id])->update([
            Livros::
        ]);

        if(empty($id)){
            return redirect("livros/$id/editar")
                ->withErrors(['msg' => 'Não foi possivel salvar esse livro no banco de dados']);
        }

        return redirect('/home')->with('sucesso','Livro salvo com sucesso!');


    }



    public function destroy($id){

    }

    */
}
