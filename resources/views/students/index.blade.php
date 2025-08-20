@extends('layouts.app')
@section('content')
<div>
<form action="{{ route('students.index') }}" method="GET" class="search-form">
    @csrf
    <input type="text" name="search" placeholder="Search students..." value="{{ request('search') }}">
    <button type="submit" class="search-sub">Search</button>
</form>
</div>
<div>add a student</div>
<div>filter</div>
<table>
  <tr>
    <th>id</th>
    <th>image</th>
    <th>full name</th>
    <th>paid amount</th>
    <th>unpaid amount</th>
  </tr>
  @foreach ($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->image }}</td>
    <td>{{ $student->name }} {{ $student->family_name }}</td>
    <td>{{ $student->paid_amount }}</td>
    <td>{{ $student->unpaid_amount }}</td>
  </tr>
    @endforeach
</table>
@endsection
