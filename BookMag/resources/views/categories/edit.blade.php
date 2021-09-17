@extends('layouts.admin')

@section('content')
    
    <form action="{{ route('categories.update', ['category'=>$category->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <h3>Actualizeaza Categorie</h3>
                <hr>
                <br>

                <div class="form-group">
                    <label>Nume:</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}" />
                    @error('category_name')
                            <small class="form-text" style="color: red;">{{ $message  }}</small> 
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizeaza Categoria</button>

            </div>
            <div class="col-lg-2"></div>
        </div>
    </form>

@endsection