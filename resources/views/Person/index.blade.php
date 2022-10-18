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
                @foreach($persons as $item)
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><span class="badge text-bg-success">Ativo</span></td>
                        <td><span class="badge text-bg-danger">Inativo</span></td>
                        <td>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                <a href="person/edit/<?= $item['id']; ?>" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confimarDelete<?= $item['id']; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="confimarDelete<?= $item['id']; ?>" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="staticBackdropLabel">Excluir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que desja remover este registro ?</p>
                                                <label for="id">Id:</label>
                                                <input type="text" class="form-control" id="id" name="id"
                                                       value="<?php echo $item['id']; ?>" disabled>
                                                <hr>
                                                <label for="name">Nome:</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="<?php echo $item['name']; ?>" disabled>
                                                <hr>
                                                <label for="email">E-mail:</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                       value="<?php echo $item['email']; ?>" disabled>
                                                <hr>
                                                <label for="status">Status:</label>
                                                <input type="text" class="form-control" id="status" name="status"
                                                       value="<?php echo $item['status']; ?>" disabled>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="person/delete/<?php echo $item['id']?>">
                                                    <input type="hidden" name="id" id="id"
                                                           value="<?php echo $item['id'] ?>">
                                                    <button type="submit" class="btn btn-warning">Confirmar<i
                                                            class="bi bi-trash"></i></button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Cancelar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection