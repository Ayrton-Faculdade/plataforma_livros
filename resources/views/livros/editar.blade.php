@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Editar informações do livro</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{"livros/$livro->id"}}"  method="post" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="inputNome" class="col-sm-1 col-form-label">Nome</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputNome" name="nome" value="{{ old('nome',$livro->nome)}}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputAutor" class="col-sm-1 col-form-label">Autor</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputAutor" name="autor" placeholder="ex: Machado de Assis" value="{{ old('autor',$livro->autor) }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputAno" class="col-sm-1 col-form-label">Ano</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputAno" name="ano" placeholder="ex: 1899" value="{{ old('ano',$livro->ano) }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputEdicao" class="col-sm-1 col-form-label">Edição</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputEdicao" name="edicao" placeholder="ex: 2" value="{{ old('edicao',$livro->edicao) }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputEditora" class="col-sm-1 col-form-label">Editora</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="inputEditora" name="editora" placeholder="ex: Principis" value="{{ old('editora',$livro->editora) }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputISBN" class="col-sm-1 col-form-label">ISBN</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputISBN" name="isbn" placeholder="Sem traços ou espaços" value="{{ old('isbn',$livro->isbn) }}" required>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="categoria" class="col-sm-1 col-form-label">Categoria</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="categoria" id="categoria" required>
                                        <option value="{{$livro->id}}">{{$livro->getCategoria->nome}}</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{($categoria->id)}}  ">{{$categoria->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tipo" class="col-sm-1 col-form-label">Tipo</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="tipo" id="tipo"  required>
                                        <option value="{{$livro->tipo}}">@if($livro->tipo==1)Troca @else Doação @endif </option>
                                        <option value='1'>Troca</option>
                                        <option value="2">Doação</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"  required>{{ old('descricao',$livro->descricao) }}</textarea>
                            </div>
                            <div class="mb-3 row">
                                <label for="formFileSm" class="col-1 col-form-label">Capa</label>
                                <div class="col-6">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="capa" value="{{$livro->capa}}"> <img src="{{url('/storage/'. $livro->capa)}}" class="img-fluid" alt="Sem imagem" style="width: 50%;">
                                </div>
                            </div>
                            <button type="submit">Cadastrar novo Livro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
