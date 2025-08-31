@extends('layouts.app')
@section('content')
    <div class="teacher-creation-container">
        <a href="{{ route('teachers.create') }}" class="teacher-creation">add a teacher</a>
    </div>
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>family name</th>
    <th>language</th>
    <th>action</th>
  </tr>
@foreach ($teachers as $teacher)
<tr>
    <td>{{ $teacher->id }}</td>
    <td>{{ $teacher->name }}</td>
    <td>{{ $teacher->family_name }}</td>
    <td>{{ $teacher->language->name }}</td>
        <td>
            <a href="{{ url('teachers/edit/'.$teacher->id) }}">Edit</a>
        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
        </td>
    </tr>
  @endforeach
</table>
@endsection
