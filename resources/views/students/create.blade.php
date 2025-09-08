@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Create Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="First Name" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="family_name" placeholder="Family Name" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="date" name="birth_date" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="adress" placeholder="Address" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="phone_number" placeholder="Phone Number" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
        </div>

<h4 class="mt-4">Select Groups</h4>
@foreach($languages as $language)
    <div class="mb-3">
        <label for="group_{{ $language->id }}" class="form-label">{{ $language->name }}</label>
        <select name="groups[{{ $language->id }}]" id="group_{{ $language->id }}" class="form-select">
            <option value="">-- Select a group --</option>
            @foreach($language->groups as $group)
                <option value="{{ $group->id }}">
                    {{ $group->name }} : {{ $group->level }}
                </option>
            @endforeach
        </select>
    </div>
@endforeach


        <button type="submit" class="btn btn-primary mt-3">Create Student</button>
    </form>
</div>
@endsection
