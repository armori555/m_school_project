@extends('layouts.app')
@section('content')
<div class="creation_container">
<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <!-- Student Info -->
    <input type="text" name="name" placeholder="First Name">
    <input type="text" name="family_name" placeholder="Family Name">
    <input type="date" name="birth_date">
    <input type="text" name="adress" placeholder="Address">
    <input type="text" name="phone_number" placeholder="Phone Number">
    <input type="email" name="email" placeholder="Email">

    <h3>Select Groups</h3>

    @foreach($languages as $language)
        <h4>{{ $language->name }}</h4>
        @foreach($language->groups as $group)
            <label>
                <input type="checkbox" name="groups[]" value="{{ $group->id }}">
                {{ $group->name }} : {{ $group->level }}
            </label><br>
        @endforeach
    @endforeach

    <button type="submit">Create Student</button>
</form>
</div>
@endsection
