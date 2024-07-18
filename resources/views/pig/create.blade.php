@extends('layouts.create')
@section('title', 'Pig') 

@section('form') 
  <form action="{{route('pigs.store')}}" method="post">
@endsection