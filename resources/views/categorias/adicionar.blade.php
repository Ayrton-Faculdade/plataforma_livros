@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Adicionar categoria') }}</div>
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
                            <form action="{{Route('categorias.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="categoria" class="col-sm-3 col-form-label">Lista das categorias existentes</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" id="categoria">
                                            <option>Lista das categorias</option>
                                            @foreach ($categorias as $categoria)
                                                <option>{{$categoria->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputCategoria" class="col-sm-3 col-form-label">Cadastrar nova Categoria</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inpuCategoria" name="nome" value="{{ old('categoria') }}" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Cadastrar nova Categoria</button>
                            </form>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
