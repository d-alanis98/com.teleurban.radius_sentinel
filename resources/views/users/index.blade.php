@extends('layout.base')

@section('content')
<style>
    table, th, td {
      border: 1px solid;
    }
    </style>
<div class='container mx-auto text-center'>
    <h1 class='text-5xl font-semibold'>Usuarios</h1>
    <table class='table min-w-full mx-auto mt-10'>
        <thead class='border-b'>
            <tr class='bg-gray-700 text-slate-50'>
                <th scope='col' class='p-4'>URI</th>
                <th scope='col' class='p-4'>Correo electrónico</th>
                <th scope='col' class='p-4'>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class='border-b'>
                <th class='p-4'>
                    <a href="{{ URL::current() }}/{{ $user->uri_user }}">
                    {{ $user->uri_user }}
                    </a>
                </th>
                <td class='p-4'>{{ $user->email }}</td>
                <td class='p-4'>{{ $user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection