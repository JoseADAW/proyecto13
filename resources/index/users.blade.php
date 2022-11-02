@extends('views.layout')

@section('content')

    <h1>Usuarios</h1>

    <ul>
        @forelse($users as $user)
            <li>{{$user}}</li>
        @empty
            <p>No hay usuarios registrados</p>
        @endforelse
    </ul>

    @include('views.sidebar')

@endsection