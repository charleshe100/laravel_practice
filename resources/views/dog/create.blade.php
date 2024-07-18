@extends('layouts.create')
@section('title', 'Dog') 

@section('form') 
  <form action="{{route('dogs.store')}}" method="post">
@endsection