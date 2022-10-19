@extends('includes.layout')
@section('titulo_pagina','Cadastros\Pessoas\Novo')
@section('content')
    @if (session('danger'))
        <div class="alert alert-danger text-center">
            <ul>
                {{ session('danger') }}
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center">
            <ul>
                {{ session('success') }}
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('person.update', $records->id)}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('person._form')
                <hr class="bg-dark">
                <button type="submit" class="btn btn-secondary mr-2">Salvar</button>
                <a href="{{route('person')}}" class="btn btn-secondary btn-padrao">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
