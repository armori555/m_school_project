@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Student</h2>
    <form action="{{ route('students.update', $students->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

        <div class="col-md-6">
            <label for="name" class="form-label">First Name</label>
            <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="family_name" class="form-label">Family Name</label>
            <input type="text" name="family_name" id="family_name" value="{{ $students->family_name }}" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ $students->birth_date }}" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="adress" class="form-label">Address</label>
            <input type="text" name="adress" id="adress" value="{{ $students->adress }}" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $students->phone_number }}" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ $students->email }}" class="form-control">
        </div>

        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
