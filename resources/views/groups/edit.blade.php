@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Group</h2>
    <form action="{{ route('groups.update', $groups->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Group Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $groups->name }}" required>
        </div>

        <div class="mb-3">
            <label for="language_id" class="form-label">Language</label>
            <select name="language_id" id="language_id" class="form-select">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ $groups->language_id == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-select">
                <optgroup label="A1">
                    <option value="A1-1" {{ $groups->level == 'A1-1' ? 'selected' : '' }}>A1-1</option>
                    <option value="A1-2" {{ $groups->level == 'A1-2' ? 'selected' : '' }}>A1-2</option>
                </optgroup>
                <optgroup label="A2">
                    <option value="A2-1" {{ $groups->level == 'A2-1' ? 'selected' : '' }}>A2-1</option>
                    <option value="A2-2" {{ $groups->level == 'A2-2' ? 'selected' : '' }}>A2-2</option>
                </optgroup>
                <option value="B1" {{ $groups->level == 'B1' ? 'selected' : '' }}>B1</option>
                <option value="B2" {{ $groups->level == 'B2' ? 'selected' : '' }}>B2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
