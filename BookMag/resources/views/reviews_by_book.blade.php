@extends('layouts.admin')

@section('content')
    
<div class="row">
                
    <div class="col-lg-12">
        
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Carte</th>
                        <th>Nume</th>
                        <th>Mesaj</th>
                        <th>Rating</th>
                        <th>Data</th>
                        <th>Acțiuni</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reviews as $review)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $review->book->title }}</td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->text }}</td>
                        <td>{{ $review->rating }}★</td>
                        <td>{{ $review->created_at }}</td>
                        <td>
                            <a onclick="event.preventDefault(); document.getElementById('review-delete-{{ $review->id }}').submit();" href="{{ route('reviews.destroy', ['review'=>$review->id ]) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                                <form action="{{ route('reviews.destroy', ['review'=>$review->id ]) }}" method="POST" id="review-delete-{{ $review->id }}">
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


    </div>
</div>

@endsection