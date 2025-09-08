@extends('layouts.app')
@section('content')
<div class="filter mb-4">
    <form action="{{ route('studentlanguages.index') }}" method="GET" class="d-flex flex-wrap gap-2 align-items-center">

        <input type="text" name="search" placeholder="Search by name..."
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
<a href="{{ route('studentlanguages.create') }}" class="btn btn-success mb-3">+ Add Studentlanguage</a>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
                    <th class="p-0">
            <a href="{{ route('studentlanguages.index', array_merge(request()->all(), ['sort' => $sort === 'asc' ? 'desc' : 'asc'])) }}"
               class="d-block w-100 h-100 text-white text-decoration-none px-3 py-2">
                Student Name
                @if($sort === 'asc')
                    ↑
                @else
                    ↓
                @endif
            </a>
        </th>
            <th>Language</th>
            <th>Group</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($studentlanguages as $studentlanguage)
        <tr>
            <td>{{ $studentlanguage->id }}</td>
            <td>{{ $studentlanguage->student->name }} {{ $studentlanguage->student->family_name }}</td>
            <td>{{ $studentlanguage->language->name }}</td>
            <td>{{ $studentlanguage->group->name }}</td>
            <td class="d-flex gap-2">
                <a href="{{ url('studentlanguages/edit/'.$studentlanguage->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('studentlanguages.destroy', $studentlanguage->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this studentlanguage?');">
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
    {{ $studentlanguages->links('pagination::bootstrap-5') }}
</div>
@endsection
