@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <form action="{{ action('ProvaController@store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <h2>Minhas Provas</h2>
        <div class="form-group">
            <div class="row justify-content-start">
                <div class="col-sm-6 offset-sm-6">
                    <div class="modal fade" id="confirm">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <form action="{{ action('TurmaController@store') }}" id="prova" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <h4>
                                            Criar prova
                                        </h4>
                                        <div>
                                            <label class="mt-2">Curso</label>
                                            <select class="form-control" name="curso" required>
                                                <option selected disabled>Selecione</option>
                                                @foreach($cursos as $curso)
                                                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                                @endforeach
                                            </select>
                                            <label class="mt-2">Turma</label>
                                            <select class="form-control" name="turma_id" disabled required>
                                                <option selected>Selecione o curso</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Quantidade de questões</label>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <label>Nível 1</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_1" value="0" min="0" max="50" required>
                                                </div>
                                                <div class="col-sm">
                                                    <label>Nível 2</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_2" value="0" min="0" max="50" required>
                                                </div><div class="col-sm">
                                                    <label>Nível 3</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_3" value="0" min="0" max="50" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Cabeçalho</label>
                                            <textarea class="w-100" name="cabecalho" style="resize:none;border-radius: 4px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="professor" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-success">Criar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-secondary float-right w-25 text-white" data-toggle="modal" data-target="#confirm">+ Criar prova</a>
                </div>
                <div class="col-sm-3">
                    <label>Curso: </label>
                    <select class="form-control" name="curso">
                        <option disabled selected>Todos</option>
                        @foreach($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Disciplina: </label>
                    <select class="form-control" name="disciplina">
                        <option value="" disabled selected>Todos</option>
                        @foreach($disciplinas as $disciplina)
                            <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Período letivo: </label>
                    <select class="form-control" name="periodo_letivo">
                    <option selected disabled>Todos</option>
                        @foreach($periodos_letivos as $periodo_letivo)
                            <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>                    
                <div class="row justify-content-center m-3">
                    <div class="col-2">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                    <div class="col-2">
                        <button type="reset" style="color:#fff;" class="btn btn-info">Limpar filtros</button>
                    </div>
                </div>
        </div>
    </form>
    
@endsection