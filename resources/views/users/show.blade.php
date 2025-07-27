@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<h2>Welcome, {{ $user->user_name }}</h2>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Mobile:</strong> {{ $user->mobile }}</p>
<p><strong>DOB:</strong> {{ $user->dob }}</p>
<p><strong>Gender:</strong> {{ $user->gender }}</p>

@php $address1 = json_decode($user->address1); @endphp
<h3>Home Address</h3>
<p>{{ $address1->door_street }}, {{ $address1->city }}, {{ $address1->state }}, {{ $address1->country }} ({{ $address1->landmark }})</p>

@if($user->address2)
@php $address2 = json_decode($user->address2); @endphp
<h3>Work Address</h3>
<p>{{ $address2->door_street ?? '' }}, {{ $address2->city ?? '' }}, {{ $address2->state ?? '' }}, {{ $address2->country ?? '' }} ({{ $address2->landmark ?? '' }})</p>
@endif

@endsection
