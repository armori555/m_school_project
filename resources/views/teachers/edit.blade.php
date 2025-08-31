@extends('layouts.app')
@section('content')
<form action="{{route('teachers.update', $teachers->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="text" name="name" value="{{ $teachers->name }}">
  <input type="text" name="family_name" value="{{ $teachers->family_name }}">

          <select name="language_id" value="{{ $teachers->language_id }}">
        @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>
  <input type="submit">
  <a href="{{route('teachers.index') }}">back</a>
@endsection
