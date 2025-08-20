@extends('layouts.app')
@section('content')
<div class="creation_container">
  <form action="{{ route('languages.store') }}" method="POST">
@csrf
    <label for="name">language name</label>
    <input type="text" name="name" id="name" required>
          <button type="submit">save</button>
    <a href="{{ route('languages.index') }}" class="return-button">cancel</a>
    </form>
</div>
@endsection
