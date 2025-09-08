@extends('layouts.app')
@section('content')
<div class="filter mb-4">
    <form action="{{ route('payments.index') }}" method="GET" class="d-flex flex-wrap gap-2 align-items-center">

        {{-- Search --}}
        <input type="text" name="search" placeholder="Search students..."
               value="{{ request('search') }}" class="form-control w-auto">

        {{-- Language filter --}}
        <select name="language_id" onchange="this.form.submit()" class="form-select w-auto">
            <option value="">-- Select Language --</option>
            @foreach($languages as $lang)
                <option value="{{ $lang->id }}" {{ request('language_id') == $lang->id ? 'selected' : '' }}>
                    {{ $lang->name }}
                </option>
            @endforeach
        </select>

        {{-- Group filter --}}
        <select name="group_id" onchange="this.form.submit()" class="form-select w-auto">
            <option value="">-- Select Group --</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>

        {{-- Date range --}}
        <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control w-auto">
        <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control w-auto">

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</div>


<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>payments</h2>
        <a href="{{ route('payments.calculate') }}" class="btn btn-success">claculate payment</a>
    <a href="{{ route('payments.create') }}" class="btn btn-success">+ Add payment</a>
</div>

<table class="table table-striped shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>full name</th>
            <th>language</th>
            <th>group</th>
            <th>amount</th>
            <th>payment date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>{{ $payment->studentlanguage->student->name }} {{ $payment->studentlanguage->student->family_name }}</td>
            <td>{{ $payment->studentlanguage->language->name }}</td>
            <td>{{ $payment->studentlanguage->group->name }}</td>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->payment_date? \Carbon\Carbon::parse($payment->payment_date)->format('d-m-Y  H:i') : ''}}</td>
            <td class="d-flex gap-2">
                <a href="{{ url('payments/edit/'.$payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this payment?');">
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
