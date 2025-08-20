@extends('layouts.app')
@section('content')
<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>name</th>
  </tr>
@foreach ($languages as $language)
<tr>
    <td>{{ $language->id }}</td>
    <td>{{ $language->name }}</td>
    </tr>
  @endforeach
</table>
@endsection
