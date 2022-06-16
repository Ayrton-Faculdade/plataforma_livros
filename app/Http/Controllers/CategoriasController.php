<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /*
    public function formulario(Request $request)
    {
        return view('categorias/adicionar',[
            #'categorias'=>$categorias,
        ]);
    }
    */

    public function index(){
        return view('categorias/adicionar');
    }

    /*
    public function save(Request $request){
        $validado= Validator::make($request->all(),[
            'nome'=>['required','max:255'],
        ]);

        if($validado->fails()){
            return redirect('categorias/adicionar')
                ->withErrors($validado)
                ->withInput();
        }

        $save = [
            'nome'=>$request->post('nome'),
        ];

        $categoriasModel = new Categorias($save);

        $id = $categoriasModel->save();

        if(empty($id)){
            return redirect('categorias/adicionar')
                ->withErrors(['msg' => 'Não foi possivel salvar essa categoria no banco de dados']);
        }

        return redirect('/home')->with('sucesso','Categoria salva com sucesso');
    }
     */
}
