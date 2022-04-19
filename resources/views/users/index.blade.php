@extends('layout.base')

@section('content')
<style>
    table, th, td {
      border: 1px solid;
    }
    </style>
<h1>Usuarios</h1>
<table>
@foreach ($users as $user)
<tr>
    <th>
        <a href="{{ URL::current() }}/{{ $user->uri_user }}">
        {{ $user->uri_user }}
        </a>
    </th>
    <td>{{ $user->email }}</td>
    <td>{{ $user->name }}</td>
</tr>
@endforeach
</table>



@endsection