@extends('layouts.index')
@section('title', 'Pig') 

@section('Addhref') 
  <a href="{{route('pigs.create')}}">Add</a>
@endsection 