@extends('layouts.admin')

@section('content')

<h3>Descriere: {{ $book->title }}</h3>

            <hr>
            <br />

<form action="{{ route('descriptions.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="form-group">
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Adaugă descrierea produsului" 
                rows="12" name="description">@if (!empty($book->description)) {{ $book->description->text }}@endif</textarea>
                @error('description')
                    <small class="form-text" style="color: red;">{{ $message  }}</small>                    
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Adaugă Descrierea</button>
            <button type="reset" class="btn btn-danger">Sterge</button>
        </div>
    </div>
</form>
    
@endsection