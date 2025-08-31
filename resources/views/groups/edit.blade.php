@extends('layouts.app')
@section('content')
<form action="{{route('groups.update', $groups->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="text" name="name" value="{{ $groups->name }}">

          <select name="language_id" value="{{ $groups->language_id }}">
        @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>
            </select>
          <select name="level" value="{{ $groups->level }}">
          <optgroup label="A1">
            <option value="A1-1">A1-1</option>
            <option value="A1-2">A1-2</option>
          </optgroup>
          <optgroup label="A2">
          <option value="A2-1">A2-1</option>
          <option value="A2-2">A2-2</option>
          </optgroup>
          <option value="B1">B1</option>
          <option value="B2">B2</option>
      </select>
  <input type="submit">
  <a href="{{route('teachers.index') }}">back</a>
@endsection
