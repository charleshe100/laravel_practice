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
  <h2>Pigs</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <div class="text-end">
    <a href="{{route('pigs.create')}}">Add</a>
  </div>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>operate</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Amy</td>
        <td>
            <a href="">Edit</a>
            <a href="">Del</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Bob</td>
        <td>
            <a href="">Edit</a>
            <a href="">Del</a>
        </td>
      </tr>
      <tr>
        <td>3</td>
        <td>Cindy</td>
        <td>
            <a href="">Edit</a>
            <a href="">Del</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script hre="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>