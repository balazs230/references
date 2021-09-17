@extends('layouts.admin')

@section('content')
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <h3>Adaugă Categorie</h3>
                <hr>
                <br>

                <div class="form-group">
                    <label>Nume:</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Adaugă numele categoriei" />
                    @error('category_name')
                            <small class="form-text" style="color: red;">{{ $message  }}</small> 
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Adaugă Categoria</button>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </form>

@endsection