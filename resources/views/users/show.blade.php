@extends('layout.base')


@section('content')
    <table>
        <tr>
            <th>{{ $user->uri_user }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td style="display: flex; align-items: center; justify-content: space-around; padding: 0.5rem;">
                <a href="{{ URL::current() }}/update">Actualizar</a>
                <button id='delete_button'>Eliminar</button>
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
<script>

    const deleteButton = document.querySelector('#delete_button');

    const makeRequest = async () => {
        try {
            const url = "{{ URL::current() }}/delete?_token={{ csrf_token() }}";

            if(!confirm('Desea eliminar'))
                throw new Error('Not allowed');
    
            const response = await fetch(url, { 
                method: 'DELETE',
            });
            return window.location.href = '/users';
        } catch(exception) {
            alert(exception.message);
        }
    }

    deleteButton.addEventListener('click', makeRequest);
</script>
@endpush

