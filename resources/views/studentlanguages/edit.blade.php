@extends('layouts.app')
@section('content')
    <form action="{{ route('studentlanguages.update', $studentlanguages->id) }}" method="POST">
        @csrf
        @method('PUT')
          <select name="student_id" value="{{ $studentlanguages->student_id }}">
        @foreach ($students as $student)
        <option value="{{ $student->id }}">{{ $student->name }} {{ $student->family_name }}</option>
        @endforeach
      </select>
          <select name="language_id" value="{{ $studentlanguages->language_id }}">
        @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>
          <select name="group_id" value="{{ $studentlanguages->group_id }}">
        @foreach ($groups as $group)
        <option value="{{ $group->id }}">{{ $group->name }}</option>
        @endforeach
      </select>

          <button type="submit">save</button>
    <a href="{{ route('studentlanguages.index') }}" class="return-button">cancel</a>
    </form>
@endsection
