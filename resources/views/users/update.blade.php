@extends('layout.base')

@section('content')

{!! Form::open(['url' => URL::current(), 'method' => 'PUT']) !!}
    <div>
        {!! Form::label('name', 'Nombre: ') !!}
        {!! Form::text('name', old('name') ?: $user->name, ['placeholder' => 'Ingrese nombre']) !!}
    </div>
    <div>
        {!! Form::label('password', 'Contraseña: ') !!}
        {!! Form::password('password', ['placeholder' => 'Ingrese contraseña']) !!}
    </div>
    {!! Form::submit() !!}
{!! Form::close() !!} 

@endsection