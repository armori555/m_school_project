@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Languages</h2>
    <a href="{{ route('languages.create') }}" class="btn btn-success">+ Add Language</a>
</div>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($languages as $language)
        <tr>
            <td>{{ $language->id }}</td>
            <td>{{ $language->name }}</td>
            <td>{{ $language->price }}</td>
            <td class="d-flex gap-2">
                <a href="{{ url('languages/edit/'.$language->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('languages.destroy', $language->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this language?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
