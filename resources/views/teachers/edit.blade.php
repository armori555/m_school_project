@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Teacher</h2>
    <form action="{{ route('teachers.update', $teachers->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" name="name" id="name" value="{{ $teachers->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="family_name" class="form-label">Family Name</label>
            <input type="text" name="family_name" id="family_name" value="{{ $teachers->family_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="language_id" class="form-label">Language</label>
            <select name="language_id" id="language_id" class="form-select">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ $teachers->language_id == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
