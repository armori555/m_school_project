@extends('layouts.app')
@section('content')
<form action="{{route('students.update', $students->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="text" name="name" value="{{ $students->name }}">
    <input type="text" name="family_name" value="{{ $students->family_name }}">
    <input type="date" name="birth_date" value="{{ $students->birth_date }}">
    <input type="text" name="adress" placeholder="Address" value="{{ $students->adress }}">
    <input type="text" name="phone_number" placeholder="Phone Number" value="{{ $students->phone_number }}">
    <input type="email" name="email" placeholder="Email"value="{{ $students->email }}">

  <input type="submit">
  <a href="{{route('students.index') }}">back</a>
</form>
@endsection
