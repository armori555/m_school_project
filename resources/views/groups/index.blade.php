@extends('layouts.app')
@section('content')
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>language</th>
    <th>level</th>
  </tr>
@foreach ($groups as $group)
<tr>
    <td>{{ $group->id }}</td>
    <td>{{ $group->name }}</td>
    <td>{{ $group->language->name }}</td>
    <td>{{ $group->level }}</td>
    </tr>
  @endforeach
</table>
@endsection
