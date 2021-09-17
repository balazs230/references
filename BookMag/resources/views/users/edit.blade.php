@extends('layouts/admin')\

@section('content')
    
<h3>Actualizează utilizator</h3>

<hr>
<br />

<form action=" {{ route('users.update', ['user'=>$user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nume:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"/>
                @error('name')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" />
                @error('email')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
            <div class="form-group">
                <label>Telefon:</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                @error('phone')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
           
            <br>
            <button type="submit" class="btn btn-primary">Actualizează utilizator</button>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Rol:</label>
                <select name="role" class="form-control @error('role') is-invalid @enderror">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : null }}>admin</option>
                    <option value="client" {{ $user->role == 'client' ? 'selected' : null }}>client</option>
                </select>
            </div>
            <div class="form-group">
                <label>Adresa:</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Adaugă adresa" rows="6">{{ $user->address }}</textarea>
                @error('address')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
        </div>
    </div>

</form>

@endsection