@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Groups</h2>
    <a href="{{ route('groups.create') }}" class="btn btn-success">+ Add Group</a>
</div>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
        <th class="p-0">
            <a href="{{ route('groups.index', array_merge(request()->all(), ['sort' => $sort === 'asc' ? 'desc' : 'asc'])) }}"
               class="d-block w-100 h-100 text-white text-decoration-none px-3 py-2">
                language
                @if($sort === 'asc')
                    ↑
                @else
                    ↓
                @endif
            </a>
        </th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($groups as $group)
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->language->name }}</td>
            <td>{{ $group->level }}</td>
            <td class="d-flex gap-2">
                <a href="{{ url('groups/edit/'.$group->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('groups.destroy', $group->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this group?');">
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
    {{ $groups->links('pagination::bootstrap-5') }}
</div>
@endsection
