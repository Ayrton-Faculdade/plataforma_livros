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
        $categorias = Categorias::all();
        $user=$livro->find($livro->id)->getUser;
        return view('livros/mostrar',[
            'livro'=>$livro,
            'categorias'=>$categorias,
            'user'=>$user,
        ]);
    }

    public function edit($id){
        $livro = Livros::findOrFail($id);
        $categorias = Categorias::all();
        if(Auth::user()->id == $livro->user_id || in_array(Auth::user()->autorizacao,[2,3])){
            return view('livros/editar',[
                'livro'=>$livro,
                'categorias'=>$categorias,
            ]);
        }else{
            return redirect('home')
                ->withErrors(['msg' => 'Não é possível alterar um livro que não é seu']);
        }
    }



    public function update(Request $request, $id){
        $livro = Livros::findOrFail($id);

        if(Auth::user()->id == $livro->user_id || in_array(Auth::user()->autorizacao,[2,3])) {
            $validado = Validator::make($request->all(), [
                'nome' => ['required', 'max:255'],
                'autor' => ['required'],
                'ano' => ['required', 'numeric'],
                'edicao' => ['required', 'numeric'],
                'editora' => ['required'],
                'isbn' => ['required'],
                'categoria' => ['required', 'numeric'],
                'tipo' => ['required', 'numeric'],
                'descricao' => ['required'],
                'capa' => ['nullable', 'image'],
            ]);

            if ($validado->fails()) {
                return redirect("livros/$id/editar")
                    ->withErrors($validado)
                    ->withInput();
            }

            $path = '';
            if (!empty($request->file('capa')) && $request->post('removercapa')==0) {
                $path = $request->file('capa')->store('capas', 'public');
            }


            $livro = Livros::find($id);

            if ($livro->id == $request->post('id')) {
                $livro->nome = $request->post('nome');
                $livro->autor = $request->post('autor');
                $livro->ano = $request->post('ano');
                $livro->edicao = $request->post('edicao');
                $livro->editora = $request->post('editora');
                $livro->isbn = $request->post('isbn');
                $livro->categoria = $request->post('categoria');
                $livro->tipo = $request->post('tipo');
                $livro->descricao = $request->post('descricao');
                if (!empty($request->file('capa')) && $request->post('removercapa')==0) {
                    $livro->capa = $path;
                }elseif($request->post('removercapa')==1){
                    $livro->capa = '';
                }
            }


            $id = $livro->save();


            if (empty($id)) {
                return redirect("livros/$id/editar")
                    ->withErrors(['msg' => 'Não foi possivel editar esse livro no banco de dados']);
            }

            return redirect('/home')->with('sucesso', 'Livro editado com sucesso!');
        }else{
            return redirect('home')
                ->withErrors(['msg' => 'Não é possível alterar um livro que não é seu']);
        }


    }

    /*

    public function destroy($id){

    }

    */
}
