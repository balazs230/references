@extends('layouts.admin')

@section('content')

<h3>Adaugă Carte</h3>

            <hr>
            <br />

            @if (1>2)
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button> The book was successfully added. 
                </div>
            @endif
            

            <br />

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Titlu:</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Adaugă titlul cartii" value="{{ old('title') }}">
                @error('title')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
            <div class="form-group">
                <label>Categorie:</label>
                @if (count($categories) > 0)
                        <select class="form-control" name="category_id">  
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>                                                                              
                            @endforeach
                        </select>
                @else
                     <input type="text" placeholder="There is no category" name="category_id" class="form-control @error('category_id') is-invalid @enderror" readonly>
                     @error('category_id')
                    <small class="form-text" style="color: red;">{{ 'First add a category!'  }}</small> 
                    @enderror
                @endif
            </div>

            <div class="form-group">
                <label>Autor:</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" placeholder="Adaugă autorul cartii" value="{{ old('author') }}">
                @error('author')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>Limba:</label>
                <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" placeholder="Adaugă limba in care este scrisa cartea" value="{{ old('language') }}">
                @error('language')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>Dimensiuni:</label>
                <input type="text" name="size" class="form-control @error('size') is-invalid @enderror" placeholder="Exemplu 230 x 200" value="{{ old('size') }}" />
                @error('size')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>Preț:</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Adaugă prețul cartii" value="{{ old('price') }}">
                @error('price')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>Discount:</label>
                <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" placeholder="Adaugă reducerea" value="{{ old('discount') }}">
                @error('discount')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>În stoc:</label>
                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Adaugă numărul de carti în stoc" value="{{ old('stock') }}">
                @error('stock')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>Numar pagini:</label>
                <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" placeholder="Adaugă numărul de pagini"  value="{{ old('pages') }}"/>
                @error('pages')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>

            <div class="form-group">
                <label>Data publicarii:</label>
                <input type="date" name="publication" class="form-control @error('publication') is-invalid @enderror"  value="{{ old('publication') }}"/>
                @error('publication')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <label>Imagine:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image"  value="{{ old('image') }}">
                @error('image')
                    <small class="form-text" style="color: red;">{{ $message  }}</small> 
                @enderror
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <br /><br />
            <button type="submit" class="btn btn-primary">Adaugă Cartea</button>
            <button type="reset" class="btn btn-danger">Sterge</button>
        </div>
    </div>
</form>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

@endsection


