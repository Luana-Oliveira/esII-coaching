@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{ $produtoservicos->tipo }}</h1>
        <p>{{ $produtoservicos->nome }}</p>
        <p>{{ $produtoservicos->descricao }}</p>
        <p>R$ {{ $produtoservicos->preco }}</p>
        <br>
        <a href="/produtoservicos" class="btn btn-info">Voltar</a>
    </div>

@endsection