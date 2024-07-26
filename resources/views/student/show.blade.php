<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
@include('include.navbar')
<div class="container mt-3 w-25">
  <h2>Student Show</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <h4>Name：{{$data->name}}</h4>
  <h4>Mobile：{{$data->mobileRelation->mobile}}</h4>  
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>