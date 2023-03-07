<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$book->title}}</h1>
                <h4>Author: {{$book->author}}</h4>
                <h4>Location: {{$book->location}}</h4>
                <h4>Year: {{$book->year}}</h4>
                <h4>Publisher: {{$book->publisher}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Stock
                </button>
                <table class="table container">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Code</th>
                            <th>Arrived</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($book->stock as $list)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$list->no_code}}</td>
                            <td>{{$list->arrived}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('book.addStock', $book->id)}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="no_code" id="" class="form-control @error('no_code') is-invalid @enderror" placeholder="No. Code" autofocus>
                                    @error('no_code')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <br>
                                    <input type="date" name="arrived" id="" class="form-control @error('arrived') is-invalid @enderror" placeholder="Arrived Date" autofocus>
                                    @error('arrived')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
