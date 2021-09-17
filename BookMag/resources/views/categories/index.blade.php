@extends('layouts.admin')

@section('content')
    
<div class="row">
    <div class="col-lg-12">

        <a href="{{ route('categories.create') }}" class="btn btn-primary">Adaugă categorie noua</a>

        <br /><br />

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categorie</th>
                        <th>Carti</th>
                        <th>În stoc</th>
                        <th>Acțiuni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->books()->count() }}</td>
                        <td>36</td>
                        <td>
                            <a href="{{ route('categories.edit', ['category'=>$category->id ]) }}"><i class="fas fa-pencil-alt text-primary"></i></a> &nbsp;
                            <a onclick="event.preventDefault(); document.getElementById('category-delete-{{ $category->id }}').submit();" href="{{ route('categories.destroy', ['category'=>$category->id ]) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                                <form action="{{ route('categories.destroy', ['category'=>$category->id ]) }}" method="POST" id="category-delete-{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        <hr>

        <ul class="pagination justify-content-center">
            <li>{{ $categories->links() }}</li>
        </ul>

    </div>
</div>

@endsection