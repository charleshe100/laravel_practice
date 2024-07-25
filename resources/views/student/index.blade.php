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

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-3 w-50">
  <h2>Student</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>  
  <div class="text-end">
    <a href="{{route('students.create')}}">
      <button class="btn btn-primary">Add</button>    
    </a>    
  </div>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>name</th>
        <th>mobile_student_id</th>
        <th>mobile_mobile</th>
        <th>operate</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $item)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$item->name}}</td>  
        <td>{{$item->mobileRelation->student_id}}</td>
        <td>{{$item->mobileRelation->mobile}}</td>
        <td>
            <a href="{{ route('students.edit', ['student' => $item->id]) }}">
              <button class="btn btn-warning">Edit</button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <form action="{{ route('students.destroy', ['student' => $item->id]) }}" method="post" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Del</button>
            </form>
        </td>        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>