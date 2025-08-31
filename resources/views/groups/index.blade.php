@extends('layouts.app')
@section('content')
    <div class="group-creation-container">
        <a href="{{ route('groups.create') }}" class="group-creation">add a group</a>
    </div>
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>language</th>
    <th>level</th>
    <th>action</th>
  </tr>
@foreach ($groups as $group)
<tr>
    <td>{{ $group->id }}</td>
    <td>{{ $group->name }}</td>
    <td>{{ $group->language->name }}</td>
    <td>{{ $group->level }}</td>
        <td>
            <a href="{{ url('groups/edit/'.$group->id) }}">Edit</a>
        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this group?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
        </td>
    </tr>
  @endforeach
</table>
@endsection
