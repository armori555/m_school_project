@extends('layouts.app')
@section('content')
<div class="filter mb-4">
    <form action="{{ route('students.index') }}" method="GET" class="d-flex flex-wrap gap-2 align-items-center">

        <input type="text" name="search" placeholder="Search students..."
               value="{{ request('search') }}" class="form-control w-auto">

        <select name="language_id" onchange="this.form.submit()" class="form-select w-auto">
            <option value="">-- Select Language --</option>
            @foreach($languages as $language)
                <option value="{{ $language->id }}" {{ request('language_id') == $language->id ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>

        <select name="group_id" onchange="this.form.submit()" class="form-select w-auto">
            <option value="">-- Select Group --</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<a href="{{ route('students.create') }}" class="btn btn-success mb-3">+ Add Student</a>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Image</th>
        <th class="p-0">
            <a href="{{ route('students.index', array_merge(request()->all(), ['sort' => $sort === 'asc' ? 'desc' : 'asc'])) }}"
               class="d-block w-100 h-100 text-white text-decoration-none px-3 py-2">
                Full Name
                @if($sort === 'asc')
                    ↑
                @else
                    ↓
                @endif
            </a>
        </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
    <tr onclick="window.location='{{ route('students.show', $student) }}'">
            <td>{{ $student->id }}</td>
            <td>
                @if($student->image)
                    <img src="{{ asset('storage/'.$student->image) }}" alt="Student Image" width="50" class="rounded">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </td>
            <td>{{ $student->name }} {{ $student->family_name }}</td>
            
            <td class="d-flex gap-2">
                <a href="{{ url('students/edit/'.$student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $students->links('pagination::bootstrap-5') }}
</div>
@endsection
