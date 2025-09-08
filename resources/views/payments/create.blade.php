@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Add a payment</h2>
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
<div class="mb-3">
<label for="studentlanguage_id" class="form-label">Student</label>

@php
    $byLang = $studentlanguages->groupBy(fn($sl) => $sl->language->name);
@endphp

<select name="studentlanguage_id" id="studentlanguage_id" class="form-select">
    @foreach ($byLang as $langName => $items)
        <optgroup label="{{ $langName }}">
            @foreach ($items as $sl)
                <option value="{{ $sl->id }}"
                        data-student="{{ $sl->student->name }} {{ $sl->student->family_name }}"
                        data-language="{{ $sl->language->name }}"
                        data-group="{{ $sl->group->name }}">
                    {{ $sl->student->name }} {{ $sl->student->family_name }} — {{ $sl->group->name }}
                </option>
            @endforeach
        </optgroup>
    @endforeach
</select>

</div>
<script>
$(document).ready(function() {
    $('#studentlanguage_id').select2({
        placeholder: "Search for a student...",
        allowClear: true
    });
});
</script>


        <div class="mb-3">
            <label for="amount" class="form-label">amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
    <label for="payment_date">Choose Date & Hour:</label>
    <input type="datetime-local" 
           id="payment_date" 
           name="payment_date" 
           class="form-control"
           value="{{ now()->setTimezone('Africa/Algiers')->format('Y-m-d\TH:i') }}">
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
