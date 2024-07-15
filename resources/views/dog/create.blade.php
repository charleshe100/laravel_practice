<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogs</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
@include('include.navbar')
<div class="container mt-3 w-25">
  <h2>Dog Create</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <form action="{{route('dogs.store')}}" method="post">
    @csrf
  <div class="mb-3 mt-3 input-grou">
    <label for="name" class="form-label">Name:</label>
    <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>