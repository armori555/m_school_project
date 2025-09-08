@extends('layouts.app')
@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Payments Report</h2>

    <!-- Filters -->
    <form method="GET" action="{{ route('payments.calculate') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Language</label>
            <select name="language_id" class="form-select">
                <option value="">-- All --</option>
                @foreach ($languages as $lang)
                    <option value="{{ $lang->id }}" {{ request('language_id') == $lang->id ? 'selected' : '' }}>
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Group</label>
            <select name="group_id" class="form-select">
                <option value="">-- All --</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" {{ request('group_id') == $group->id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">From</label>
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
        </div>

        <div class="col-md-2">
            <label class="form-label">To</label>
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
        </div>

        <div class="col-md-2">
            <label class="form-label">Report By</label>
            <select name="type" class="form-select">
                <option value="student" {{ request('type')=='student' ? 'selected' : '' }}>Student</option>
                <option value="group" {{ request('type')=='group' ? 'selected' : '' }}>Group</option>
                <option value="language" {{ request('type')=='language' ? 'selected' : '' }}>Language</option>
                <option value="all" {{ request('type')=='all' ? 'selected' : '' }}>All</option>
            </select>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
    </form>

    <!-- Results -->
    @if ($type === 'student')
        <table class="table table-bordered">
            <thead>
                <tr><th>Student</th><th>Total Paid</th></tr>
            </thead>
            <tbody>
                @foreach ($results as $row)
                    <tr>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['amount'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif ($type === 'group')
        <table class="table table-bordered">
            <thead>
                <tr><th>Group</th><th>Language</th><th>Total Paid</th></tr>
            </thead>
            <tbody>
                @foreach ($results as $row)
                    <tr>
                        <td>{{ $row['group'] }}</td>
                        <td>{{ $row['language'] }}</td>
                        <td>{{ $row['amount'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif ($type === 'language')
        <table class="table table-bordered">
            <thead>
                <tr><th>Language</th><th>Total Paid</th></tr>
            </thead>
            <tbody>
                @foreach ($results as $row)
                    <tr>
                        <td>{{ $row['language'] }}</td>
                        <td>{{ $row['amount'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>Total Payments: {{ $results['total'] }}</h4>
    @endif
</div>
@endsection
