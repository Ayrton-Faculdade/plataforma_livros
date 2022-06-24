@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Informações do livro</div>
                    <div class="card-body">
                        <div style="background: #efefef;padding:5px 0px 5px 5px;">
                            <img src="{{url('/storage/'. $livro->capa)}}" class="img-fluid" alt="Sem imagem" style="width: 50%;">
                            <div class="" style="display: inline-block;">
                                <a href="#" class="btn btn-primary" style="display: block; margin: 25px 75px 0px 150px;">Entrar em Contato</a>
                                @if(Auth::user()->id == $livro->user_id)<a href="{{url("livros/$livro->id/editar")}}" class="btn btn-warning" style="display: block; margin: 25px 75px 0px 150px;" >Editar Livro</a>@endif
                                @if(Auth::user()->id == $livro->user_id)<a href="#" class="btn btn-danger" style="display: block; margin: 25px 75px 5px 150px;" >Deletar Livro</a>@endif
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div style="background: #efefef">
                                <div class="row mb-2">
                                    <div class="col-1">
                                        Nome:
                                    </div>
                                    <div class="col">
                                        {{$livro->nome}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-1">
                                        Autor:
                                    </div>
                                    <div class="col">
                                        {{$livro->autor}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-1">
                                        Ano:
                                    </div>
                                    <div class="col-2" style="border-right: 3px solid white">
                                        {{$livro->ano}}
                                    </div>
                                    <div class="col-2" style="border-right: 3px solid white">
                                        {{$livro->edicao}} ª Edição
                                    </div>
                                    <div class="col-1">
                                        Editora:
                                    </div>
                                    <div class="col-3" style="border-right: 3px solid white">
                                        {{$livro->editora}}
                                    </div>
                                    <div class="col-1">
                                        ISBN:
                                    </div>
                                    <div class="col" style="border-right: 3px solid white">
                                        {{$livro->isbn}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">
                                        Categoria:
                                    </div>
                                    <div class="col">
                                        {{$livro->getCategoria->nome}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <h5 class="card-title mb-0">Descrição:</h5>
                                    <div class="pt-3">
                                        {{$livro->descricao}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">
                                        Postado por:
                                    </div>
                                    <div class="col">
                                        {{$user->name}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">
                                        Tipo:
                                    </div>
                                    <div class="col">
                                        @if ($livro->tipo==1) Troca @else Doação @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
