@extends('layouts/admin')

@section('content')
    
<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nume</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Adresa</th>
                        <th>Rol</th>
                        <th>Comenzi</th>
                        <th>Acțiuni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a href="{{ route('user.orders', ['id'=>$user->id]) }}">{{ $user->orders->count() }}</a></td>
                        <td>
                            <a href="{{ route('users.edit', ['user'=>$user->id ]) }}"><i class="fas fa-pencil-alt text-primary"></i></a> &nbsp;
                            <a onclick="event.preventDefault(); document.getElementById('user-delete-{{ $user->id }}').submit();" href="{{ route('users.destroy', ['user'=>$user->id ]) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                                <form action="{{ route('users.destroy', ['user'=>$user->id ]) }}" method="POST" id="user-delete-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <ul class="pagination justify-content-center">
            <li>{{ $users->links() }}</li>
        </ul>
    </div>
</div>

<hr>


@endsection