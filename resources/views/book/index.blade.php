@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('book.create')}}" class="btn btn-primary">Add Book</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table container">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Location</th>
                        <th scope="col">Year</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{$i = 1}}
                    @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->location}}</td>
                        <td>{{$book->year}}</td>
                        <td>{{$book->publisher}}</td>
                        <td>
                            <form action="{{route('book.destroy', $book)}}" method="post">
                                <div class="btn-group">
                                    <a href="{{route('book.show', $book)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('book.edit', $book)}}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onClick='alert("Delete?")' class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="#">
@endpush