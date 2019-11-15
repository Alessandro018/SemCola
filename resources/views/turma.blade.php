@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <h2>Minhas turmas</h2>
    <div class="form-group">
        <div class="row justify-content-start">
            <div class="col-sm-6 offset-sm-6">
                <a class="btn btn-secondary float-right w-25 text-white" data-toggle="modal" data-target="#confirm">+ Importar dados</a>
                <div class="modal fade" id="confirm">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                    <form action="{{ action('TurmaController@store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                                <div class="modal-body">
                                    <h4>
                                        Importar dados
                                    </h4>
                                    <div>
                                        <label>Curso</label>
                                        <select class="form-control" name="curso" require>
                                            <option value="1">curso</option>
                                        </select>
                                        <label>Disciplina</label>
                                        <select class="form-control" name="disciplina" require>
                                            <option value="5">Disciplina</option>
                                        </select>
                                        <label>Período letivo</label>
                                        <select class="form-control" name="periodo_letivo" require>
                                            <option value="2">Período letivo</option>
                                        </select>
                                        <br>
                                        <label>Selecione o arquivo</label>
                                        <input name="file" class="form-control-file" type="file" require>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Importar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                </div>
                    </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>Nome do aluno: </label>
                <input type="text" class="form-control" name="nome" placeholder="" required>
            </div>
            <div class="col-sm-3">
                <label>Matrícula: </label>
                <input type="text" class="form-control" name="matricula" placeholder="" required>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-3">
                <label>Curso: </label>
                <select class="form-control" name="curso">
                    <option value="">Todos</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Disciplina: </label>
                <select class="form-control" name="disciplina">
                    <option value="">Todos</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Período letivo: </label>
                <select class="form-control" name="periodo_letivo">
                    <option value="">Todos</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center m-3">
            <div class="col-2">
                <a class="btn btn-success" href="">Buscar</a>
            </div>
            <div class="col-2">
                <a style="color:#fff;" class="btn btn-info" href="">Limpar filtros</a>
            </div>
        </div>
    </div>
    <table class="table table-sm">
        <tr>
			<th>Matrícula</th>
			<th>Nome completo</th>
            <th>Curso</th>
			<th>Disciplina</th>
			<th>Período letivo</th>
			<th>Situação</th>
		</tr>
        @foreach($turmas as $turma)
            <tr>
                <td>{{$turma->matricula}}</td>
                <td>{{$turma->nome}}</td>
                <td>{{$turma->curso}}</td>
                <td>{{$turma->materia}}</td>
                <td>{{$turma->ano}}.{{$turma->semestre}}</td>
                <td><a class="btn btn-secondary" href="">Detalhe</a></td>
            </tr>
        @endforeach
    </table>
    {{ $turmas->links() }}
@endsection