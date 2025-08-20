@extends('layouts.app')
@section('content')
<div class="creation_container">
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
    <label for="name"> name</label>
    <input type="text" name="name" id="name" required>

        <label for="family_name">family name</label>
    <input type="text" name="family_name" id="family_name" required>

          <select name="language_id" >
        @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>

          <button type="submit">save</button>
    <a href="{{ route('teachers.index') }}" class="return-button">cancel</a>
    </form>
</div>
@endsection
