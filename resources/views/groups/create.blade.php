@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Add Group</h2>
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Group Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="language_id" class="form-label">Language</label>
            <select name="language_id" id="language_id" class="form-select">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-select">
                <optgroup label="A1">
                    <option value="A1-1">A1-1</option>
                    <option value="A1-2">A1-2</option>
                </optgroup>
                <optgroup label="A2">
                    <option value="A2-1">A2-1</option>
                    <option value="A2-2">A2-2</option>
                </optgroup>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
