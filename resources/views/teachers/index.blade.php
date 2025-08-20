@extends('layouts.app')
@section('content')
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>family name</th>
    <th>language</th>
  </tr>
@foreach ($teachers as $teacher)
<tr>
    <td>{{ $teacher->id }}</td>
    <td>{{ $teacher->name }}</td>
    <td>{{ $teacher->family_name }}</td>
    <td>{{ $teacher->language->name }}</td>
    </tr>
  @endforeach
</table>
@endsection
