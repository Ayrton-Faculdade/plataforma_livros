@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Página Principal') }}</div>

                <div class="card-body">
                    @if (session('sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sucesso') }}
                        </div>
                    @endif
                    <div class="row row-cols-1 row-cols-md-3 g-4 ">
                        @foreach ($livros as $livro)
                            <div class="card ">
                                <img src="{{url('/storage/'. $livro->capa)}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{$livro->nome}}</h5>
                                    <p class="card-text">{{ strlen($livro->descricao) > 50 ? substr($livro->descricao,0,100).'..' : $livro->descricao }}</p>
                                    @if ($livro->tipo==1)
                                        <h7><a href="#" class="btn btn-primary">Entrar em contato</a><span style="float:right;">Troca</span></h7>
                                    @else
                                        <h7><a href="#" class="btn btn-primary">Entrar em contato</a><span style="float:right;">Doação</span></h7>
                                    @endif
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
