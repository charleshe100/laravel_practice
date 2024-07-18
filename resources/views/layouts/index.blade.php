<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
@include('include.navbar')
<div class="container mt-3 w-25">
  <h2>@yield('title')</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <div class="text-end">
    @yield('Addhref')    
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
            <a href="">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="">Del</a>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Bob</td>
        <td>
            <a href="">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="">Del</a>
        </td>
      </tr>
      <tr>
        <td>3</td>
        <td>Cindy</td>
        <td>
            <a href="">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="">Del</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>