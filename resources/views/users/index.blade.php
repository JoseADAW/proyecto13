@extends('layout')

@section('title', $title)

@section('content')
    <h1>Usuarios</h1>

    <ul>
        @forelse($users as $user)
            <li>
                {{ $user->name }} ({{$user->email}})
                <a href="{{route('user.show',$user->id)}}">Ver detalles</a>
            </li>
        @empty
            <p>No hay usuarios registrados</p>
        @endforelse
    </ul>
@endsection