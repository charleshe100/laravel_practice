@extends('layouts.edit')
@section('title', 'Pig') 

@section('form') 
  <form action="{{route('pigs.update', ['pig' => $data->id])}}" method="post">
@endsection