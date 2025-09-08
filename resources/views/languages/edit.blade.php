@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Edit Language</h2>
    <form action="{{ route('languages.update', $languages->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Language Name</label>
            <input type="text" name="name" id="name" value="{{ $languages->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Language price</label>
            <input type="number" name="price" id="price" value="{{ $languages->price }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
