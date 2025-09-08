@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Student Language</h2>
    <form action="{{ route('studentlanguages.update', $studentlanguages->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" id="student_id" class="form-select">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $studentlanguages->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} {{ $student->family_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="language_id" class="form-label">Language</label>
            <select name="language_id" id="language_id" class="form-select">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ $studentlanguages->language_id == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="group_id" class="form-label">Group</label>
            <select name="group_id" id="group_id" class="form-select">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ $studentlanguages->group_id == $group->id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('studentlanguages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
