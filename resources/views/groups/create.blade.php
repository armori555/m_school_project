@extends('layouts.app')
@section('content')
<div class="creation_container">
    <form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="name"> name</label>
    <input type="text" name="name" id="name" required>

          <select name="language_id" >
        @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>
          <select name="level" >
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
          <button type="submit">save</button>
    <a href="{{ route('groups.index') }}" class="return-button">cancel</a>
    </form>
</div>
@endsection
