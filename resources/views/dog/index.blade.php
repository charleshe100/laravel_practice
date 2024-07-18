@extends('layouts.index')
@section('title', 'Dog') 

@section('Addhref') 
  <a href="{{route('dogs.create')}}">Add</a>
@endsection