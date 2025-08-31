@extends('layouts.app')
@section('content')
<form action="{{route('languages.update', $languages->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="text" name="name" value="{{ $languages->name }}">
  <input type="submit">
  <a href="{{route('languages.index') }}">back</a>
@endsection
