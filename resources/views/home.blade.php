@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Página principal') }}</div>
                <div class="card-body">
                    @if (session('sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sucesso') }}
                        </div>
                    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($livros as $livro)
                            <div class="card">
                                <h5 class="card-title" style="text-align: center ;">{{strlen($livro->nome) > 25 ? substr($livro->nome,0,25).'..' : $livro->nome}}</h5>
                                <div style="height: 17rem;">
                                    <img src="{{url('/storage/'. $livro->capa)}}" class="card-img-top" alt="Sem Imagem"  style="max-height: 300px;">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5>Autor: {{strlen($livro->autor) > 5 ? substr($livro->autor,0,5).'...': $livro->autor}}<span style="float:right">{{strlen($livro->categoria) > 7 ? substr($livro->categoria,0,7).'...' : $livro->categoria}}</span></h5>

                                    <p class="card-text mb-4" style="height: 7em;">{{ strlen($livro->descricao) > 70 ? substr($livro->descricao,0,70).'..' : $livro->descricao }}</p>

                                    <h7><a href="{{url("livros/$livro->id")}}" class="btn btn-primary">Visualizar</a> <span style="float:right;">@if ($livro->tipo==1) Troca @else Doação @endif</span></h7>

                                    @php  $user=$livro->find($livro->id)->getUser; @endphp
                                    Postado por: {{strlen($livro->getUser)>7 ? substr($user->name,0,7).'...' : $user->name}} {{strlen($user->sobrenome)>7? substr($user->sobrenome,0,7).'...' : $user->sobrenome}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
