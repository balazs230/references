@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">

        <a href="{{ route('books.create') }}" class="btn btn-primary">Adaugă carte noua</a>

        <br /><br />
        <div class="table-responsive-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titlu</th>
                        <th>Categorie</th>
                        <th>Author</th>
                        <th>Preț</th>
                        <th>Pagini</th>
                        <th>Publicare</th>
                        <th>Limba</th>
                        <th>Dimensiuni</th>
                        <th>Stoc</th>
                        <th>Reviews</th>
                        <th>Acțiuni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->category->category_name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ date('Y', strtotime($book->publication)) }}</td>
                            <td>{{ $book->language }}</td>
                            <td>{{ $book->size }}</td>
                            <td>{{ $book->stock }}</td>
                            <td><a href="{{ route('book.reviews', ['id'=>$book->id]) }}">{{ $book->reviews()->count() }}</a></td>
                            <td>
                                <a href="{{ route('books.show', ['book'=>$book->id ]) }}" target="_blank"><i class="fas fa-eye text-success"></i></a> &nbsp;
                                <a href="{{ route('books.edit', ['book'=>$book->id ]) }}"><i class="fas fa-pencil-alt text-primary"></i></a> &nbsp;
                                <a href="{{ route('book.description', ['book_id'=>$book->id ]) }}"><i class="fas fa-file-alt text-primary"></i></a> &nbsp;
                                <a onclick="event.preventDefault(); document.getElementById('book-delete-{{ $book->id }}').submit();" href="{{ route('books.destroy', ['book'=>$book->id ]) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                                <form action="{{ route('books.destroy', ['book'=>$book->id ]) }}" method="POST" id="book-delete-{{ $book->id }}">
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
            <li>{{ $books->links() }}</li>
        </ul>

    </div>
</div>

@endsection


