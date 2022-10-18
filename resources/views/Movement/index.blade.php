@extends('includes.layout')
@section('titulo_pagina','Cadastros\Pessoas')
@section('content')

    <a href="/person/new" class="btn btn-primary">Novo</a>
    <hr class="bg-dark">

    <div class="container-fluid">
        <div class="row mt-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($registers as $item)
                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->name ?></td>
                        <td><?php echo $item->email ?></td>
                        <td><span class="badge text-bg-success">Ativo</span></td>
                        <td><span class="badge text-bg-danger">Inativo</span></td>
                        <td>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                <a href="person/edit/<?= $item['id']; ?>" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-secondary btn-padrao-icon"
                                        data-bs-toggle="modal" data-bs-target="#delete{{$registro->id}}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <div class="modal fade" id="delete{{$registro->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Excluir
                                                    registro</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <p>Tem certeza que deseja excluir o registro<span
                                                            class="text-center font-weight-bold"> {{$registro->id}} ?</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{route('income.delete',$registro->id)}}"
                                                   class="btn btn-secondary btn-padrao">Confirmar</a>
                                                <button type="button" class="btn btn-secondary btn-padrao"
                                                        data-bs-dismiss="modal">Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('arquivo.index') }}" method="get">
                                    <input type="hidden" id="cnpj_cpf" name="cnpj_cpf"
                                           value="{{$registro->cnpj_cpf}}">
                                    <button type="submit" class="btn btn-secondary"><i
                                            class="bi bi-filetype-xml"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
