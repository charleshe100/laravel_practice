<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigs</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fs-3 text-center">
  <div class="container-fluid">    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('pigs.index')}}">Pigs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dogs</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-3 w-25">
  <h2>Pigs Create</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <form action="{{route('pigs.store')}}" method="post">
  <div class="mb-3 mt-3 input-grou">
    <label for="name" class="form-label">Name:</label>
    <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script hre="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>