@extends('layouts.app')
@section('title', 'Register')
@section('content')

<h2>Register</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    @include('users.partials.form')
    <button type="submit">Register</button>
</form>

@endsection
