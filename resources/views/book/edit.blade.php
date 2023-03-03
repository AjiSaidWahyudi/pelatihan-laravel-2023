<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <h1>Input Book</h1>
        <hr>
        <form action="{{route('book.update', $book)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Book Title" value="{{$book->title}}">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <br>
            <input type="text" name="author" id="" class="form-control @error('author') is-invalid @enderror" placeholder="Book Author" value="{{$book->author}}">
            @error('author')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <br>
            <input type="text" name="location" id="" class="form-control @error('location') is-invalid @enderror" placeholder="Location Released" value="{{$book->location}}">
            @error('location')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <br>
            <input type="text" name="year" id="" class="form-control @error('year') is-invalid @enderror" placeholder="Year Released" value="{{$book->year}}">
            @error('year')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <br>
            <input type="text" name="publisher" id="" class="form-control @error('publisher') is-invalid @enderror" placeholder="Book Publisher" value="{{$book->publisher}}">
            @error('publisher')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>