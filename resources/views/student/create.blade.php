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
  <h2>Student Create</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <form action="{{route('students.store')}}" method="post">
    @csrf
  <div class="mb-3 mt-3 input-grou">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
  </div>  
  <div class="mb-3 mt-3 input-grou">
    <label for="mobile" class="form-label">Mobile:</label>
    <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile">
  </div>  
  <div class="mb-3 mt-3 input-grou">
    <label for="love" class="form-label">Love:（ex:登山,跑步,php,javascript）</label>
    <input type="text" class="form-control" id="love" placeholder="Enter love" name="love">
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>