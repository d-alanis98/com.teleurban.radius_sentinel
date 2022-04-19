@extends('layout.base')

@section('content')

{!! Form::open(['url' => URL::current()]) !!}
    <div>
        {!! Form::label('email', 'Correo: ') !!}
        {!! Form::text('email', old('email'), ['placeholder' => 'Ingrese correo']) !!}
    </div>
    <div>
        {!! Form::label('name', 'Nombre: ') !!}
        {!! Form::text('name', old('name'), ['placeholder' => 'Ingrese nombre']) !!}
    </div>
    <div>
        {!! Form::label('password', 'Contraseña: ') !!}
        {!! Form::password('password', ['placeholder' => 'Ingrese contraseña']) !!}
    </div>
    {!! Form::submit() !!}
{!! Form::close() !!} 

@endsection