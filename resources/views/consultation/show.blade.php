@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="card">
        <div class="card-header">
           Consulta de {{$consultation->date->format('d/m/Y H:i')}}
        </div>
        <div class="card-body">
            <p>Local: {{$consultation->location}}</p>
            <p>Comentários: {!! $consultation->comments !!}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('consultations.edit',['id'=>$consultation->id]) }}" class="btn btn-warning">Editar</a>
            <form action="{{route('consultations.destroy',['id'=>$consultation->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>

    </div>
@endsection