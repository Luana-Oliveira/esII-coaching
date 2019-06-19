@extends('layouts.app')

@section('content')
    <form action="{!! url("posts/{$calopsita->id}") !!}" method="POST">
        @csrf
        @method('put')
        <input type="text" value="{{ $calopsita->name }}" name="picapau">
        <button type="submit">Enviar</button>
    </form>
@endsection