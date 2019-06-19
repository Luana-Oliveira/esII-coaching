@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="card">
        <div class="card-header">
            Minhas Consultas <a href="{{ route('consultations.create') }}" class="btn btn-dark">Incluir</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Local</th>
                    <th>Comentários</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consultations as $consultation)
                <tr >
                    <td>
                        <a href="{{ route('consultations.show',['id'=>$consultation->id]) }}">
                        {{ $consultation->date->format('d/m/Y H:i') }}
                        </a>
                    </td>
                    <td>{{ $consultation->location }}</td>
                    <td>{{ $consultation->comments }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
@endsection