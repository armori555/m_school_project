@extends('layouts.app')
@section('content')
<div>
    <div>picture</div>
    <div>name: {{ $students->name }}</div>
    <div>family name: {{ $students->family_name }}</div>
    <div>date of birth: {{ $students->birth_date }}</div>
    <div>adress: {{ $students->adress }}</div>
    <div>email: {{ $students->email }}</div>
    <div>phone number: {{ $students->phone_number }}</div>
    <div>subjects: {{ $students->subject }}</div>
    <div>level: {{ $students->level }}</div>
    <div>paid amount: {{ $students->paid_amount }}</div>
    <div>unpaid amount: {{ $students->unpaid_amount }}</div>
</div>
<div>
    <form action="">
                <label for="message">message</label>
    <textarea name="message" id="message"></textarea>
        <button type="submit">send</button>
    </form>
</div>
@endsection
