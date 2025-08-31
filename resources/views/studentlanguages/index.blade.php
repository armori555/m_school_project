@extends('layouts.app')
@section('content')
<div class="filter">
      {{-- filter --}}
    <form action="{{ route('studentlanguages.index') }}" method="GET" class="search-form">
      {{-- filter by name --}}
        <input type="text" name="search" placeholder="Search by name..."
               value="{{ request('search') }}" >
      {{-- filter by language --}}
        <select name="language_id" onchange="this.form.submit()">
            <option value="">-- Select Language --</option>
            @foreach($languages as $language)
                <option value="{{ $language->id }}" {{ request('language_id') == $language->id ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
        {{-- filter by group--}}
        <select name="group_id" onchange="this.form.submit()">
            <option value="">-- Select Group --</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    
    <button type="submit">Search</button>

        {{-- creation --}}
        <div class="studentlanguage-creation-container">
        <a href="{{ route('studentlanguages.create') }}" class="studentlanguage-creation">add a Studentlanguage</a>
        </div>

    {{-- sorting --}}
        <input type="hidden" name="sort" value="{{ $sort === 'asc' ? 'desc' : 'asc' }}">
        <button type="submit" class="btn-sort">
            {{ $sort === 'asc' ? 'A→Z' : 'Z→A' }}
        </button>
  </form>
</div>




<table  class="table table-striped shadow">
  <tr>
    <th>id</th>
    <th>student name</th>
    <th>language</th>
    <th>group</th>
    <th>action</th>
  </tr>
@foreach ($studentlanguages as $studentlanguage)
<tr>
    <td>{{ $studentlanguage->id }}</td>
    <td>{{ $studentlanguage->student->name }} {{ $studentlanguage->student->family_name }}</td>
    <td>{{ $studentlanguage->language->name }}</td>
    <td>{{ $studentlanguage->group->name }}</td>
        <td>
          {{-- editing --}}
            <a href="{{ url('studentlanguages/edit/'.$studentlanguage->id) }}">Edit</a>
          {{-- deletion --}}
        <form action="{{ route('studentlanguages.destroy', $studentlanguage->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this studentlanguage?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
    <div >{{ $studentlanguages->links('pagination::bootstrap-5') }}</div>
</table>
@endsection
