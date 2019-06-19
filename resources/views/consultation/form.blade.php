@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="card">
        <div class="card-header">
           Cadastrar consulta
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url("consultations/{$consultation->id}") }}">
                @if($consultation->id) @method('put') @endif
                @csrf
                    <label>Data</label>
                <input type="date"
                       name="date"
                       value="{{ $consultation->date->format('Y-m-d') ?? old('date') }}" class="form-control"
                       required="required">
                    <label>Horário</label>
                    <select name="hour" class="form-control">
                        @for($i= 8;$i<22;$i++)
                            <option value="{{ ($i < 10) ? "0$i" : $i }}:00">{{$i}}:00</option>
                        @endfor
                    </select>
                    <label>Local</label>
                <input type="text"
                       name="location"
                       value="{{ $consultation->location ?? old('location') }}"
                       class="form-control"
                       required="required">
                    <label>Comentários</label>
                <textarea name="comments"
                          required="required"
                          class="form-control">{{ $consultation->comments ?? old('textarea') }}
                </textarea>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>

    </div>
@endsection