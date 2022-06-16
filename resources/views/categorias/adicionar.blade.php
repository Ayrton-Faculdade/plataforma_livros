@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Adicionar Categoria') }}</div>
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
                        <!--
                        <form action="{Route('categorias.save')}}" method="post" enctype='multipart/form-data'>
                        -->
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <!--
                                <div class="mb-3 row">
                                    <label for="categoria" class="col-sm-1 col-form-label">Lista das categorias existentes</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="" id="categoria">
                                            <option value="">Lista das categorias</option>
                                            foreach (categorias as categoria)
                                                <option value="{categoria->id}}">{categoria->nome}}</option>
                                            endforeach
                                        </select>
                                    </div>
                                </div>
                                -->
                                <div class="mb-3 row">
                                    <label for="inputCategoria" class="col-sm-3 col-form-label">Cadastrar nova Categoria</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputAutor" name="categoria" value="{{ old('categoria') }}" required>
                                    </div>
                                </div>
                            </form>
                            <button type="submit">Cadastrar nova Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
