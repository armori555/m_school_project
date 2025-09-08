@extends('layouts.app')
@section('content')
<div class="container text-center mt-5">
    <h2 class="mb-3">Navigation</h2>
    <div class="d-grid gap-3" style="max-width: 300px; margin: auto;">
        <a href="{{ route('languages.index') }}" class="btn btn-primary btn-lg">Languages</a>
        <a href="{{ route('teachers.index') }}" class="btn btn-primary btn-lg">Teachers</a>
        <a href="{{ route('groups.index') }}" class="btn btn-primary btn-lg">Groups</a>
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg">Students</a>
        <a href="{{ route('studentlanguages.index') }}" class="btn btn-primary btn-lg">Student Languages</a>
        <a href="{{ route('payments.index') }}" class="btn btn-primary btn-lg">payment</a>
    </div>
</div>
@endsection
