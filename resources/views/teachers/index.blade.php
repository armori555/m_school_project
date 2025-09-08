@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Teachers</h2>
    <a href="{{ route('teachers.create') }}" class="btn btn-success">+ Add Teacher</a>
</div>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Family Name</th>
            <th>Language</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->family_name }}</td>
            <td>{{ $teacher->language->name }}</td>
            <td class="d-flex gap-2">
                <a href="{{ url('teachers/edit/'.$teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
