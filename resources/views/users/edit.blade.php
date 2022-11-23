@extends('layout')

@section('content')
    <h1>Editar usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor, corrige los siguientes errores:</h6>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{route('user.update',$user)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <label for="name">Nombre:</label>
        <input type="text" name="name" placeholder="Nombre" value="{{old('name',$user->name)}}">
        @if($errors->has('name'))
            <p>{{$errors->first('name')}}</p>
        @endif
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" value="{{old('email',$user->email)}}">
        @if($errors->has('email'))
            <p>{{$errors->first('email')}}</p>
        @endif
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña">
        @if($errors->has('password'))
            <p>{{$errors->first('password')}}</p>
        @endif
        <br>


        <button type="submit">Actualizar usuario</button>
    </form>

    <p>
        <a href="{{route('users')}}">Regresar al listado de usuarios</a>
    </p>
@endsection