@extends('includes.layout')
@section('titulo_pagina',\App\Modules\Utils\Constants::TITLES['person']['new'])
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
            <form action="{{route("income.save")}}" method="post">
                {{ csrf_field() }}
                @include('income._form')
                <hr class="bg-dark">
                <button type="submit" class="btn btn-secondary mr-2">Salvar</button>
                <a href="{{route('income')}}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
