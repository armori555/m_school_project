@extends('layouts.app')
@section('content')
    <div class="language-creation-container">
        <a href="{{ route('languages.create') }}" class="language-creation">add a language</a>
    </div>
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>action</th>
  </tr>
@foreach ($languages as $language)
<tr>
    <td>{{ $language->id }}</td>
    <td>{{ $language->name }}</td>
        <td>
            <a href="{{ url('languages/edit/'.$language->id) }}">Edit</a>
        <form action="{{ route('languages.destroy', $language->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this language?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
        </td>
    </tr>
  @endforeach
</table>
@endsection
