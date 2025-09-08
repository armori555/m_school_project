@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh; gap:20px;">

    <!-- Student Info Card -->
    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-3">
            <div style="width:100px; height:100px; background:#e9ecef; border-radius:50%; margin:auto; display:flex; align-items:center; justify-content:center;">
                picture
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Name:</strong> {{ $students->name }}</li>
            <li class="list-group-item"><strong>Family name:</strong> {{ $students->family_name }}</li>
            <li class="list-group-item"><strong>Date of birth:</strong> {{ $students->birth_date }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $students->adress }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $students->email }}</li>
            <li class="list-group-item"><strong>Phone number:</strong> {{ $students->phone_number }}</li>
            <li class="list-group-item d-flex align-items-center">
    <strong class="me-2">Subjects:</strong>
    <div class="d-flex flex-wrap gap-2">
        @forelse($students->studentlanguages as $sl)
            <span class="badge bg-primary px-3 py-2">{{ $sl->language->name }}</span>
        @empty
            <span class="text-muted">No subjects yet</span>
        @endforelse
    </div>
            </li>
        </ul>
    </div>

    <!-- Message Card -->
    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
        <form action="" class="d-flex flex-column">
            <label for="message" class="form-label fw-bold">Message</label>
            <textarea name="message" id="message" rows="5" class="form-control mb-3" style="resize:none;"></textarea>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>

</div>
@endsection
