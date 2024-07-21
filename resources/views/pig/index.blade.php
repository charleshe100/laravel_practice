@extends('layouts.index')
@section('title', 'Pig') 

{{-- @section('data')
  @php
    dump($data);
  @endphp
@endsection --}}

@section('Addhref') 
  <a href="{{route('pigs.create')}}">
    <button class="btn btn-primary">Add</button>    
  </a>
@endsection 

@section('tr')
@foreach ($data as $item)
<tr>
  <td>{{$item->id}}</td>
  <td>{{$item->name}}</td>
  <td>
      <a href="{{ route('pigs.edit', ['pig' => $item->id]) }}">
        <button class="btn btn-warning">Edit</button>
      </a>&nbsp;&nbsp;&nbsp;&nbsp;
      <form action="{{ route('pigs.destroy', ['pig' => $item->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Del</button>
      </form>
  </td>
</tr>
@endforeach
@endsection 