@extends('layouts.app')
@section('content')
<div>
<form action="{{ route('students.index') }}" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search students..."
           value="{{ request('search') }}">

    <select name="language_id" onchange="this.form.submit()">
        <option value="">-- Select Language --</option>
        @foreach($languages as $language)
            <option value="{{ $language->id }}" {{ request('language_id') == $language->id ? 'selected' : '' }}>
                {{ $language->name }}
            </option>
        @endforeach
    </select>

    <select name="group_id" onchange="this.form.submit()">
        <option value="">-- Select Group --</option>
        @foreach($groups as $group)
            <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                {{ $group->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Search</button>

        {{--  Sort --}}
        <input type="hidden" name="sort" value="{{ $sort === 'asc' ? 'desc' : 'asc' }}">
        <button type="submit" class="btn-sort">
            {{ $sort === 'asc' ? 'A→Z' : 'Z→A' }}
        </button>
</form>

</div>
    <div class="Student-creation-container">
        <a href="{{ route('students.create') }}" class="student-creation">add a student</a>
    </div>
<table>
  <tr>
    <th>id</th>
    <th>image</th>
    <th>full name</th>
    <th>paid amount</th>
    <th>unpaid amount</th>
    <th>action</th>
  </tr>
  @foreach ($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->image }}</td>
    <td>{{ $student->name }} {{ $student->family_name }}</td>
    <td>{{ $student->paid_amount }}</td>
    <td>{{ $student->unpaid_amount }}</td>
    <td>
            <a href="{{ url('students/edit/'.$student->id) }}">Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
        </td>
  </tr>
    @endforeach
        <div >{{ $students->links('pagination::bootstrap-5') }}</div>
</table>
@endsection
