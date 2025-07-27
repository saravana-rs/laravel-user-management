@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="alert alert-success mb-4">
                        <h4 class="alert-heading">Welcome back, {{ $user->user_name }}!</h4>
                        <p class="mb-0">You're logged in to your personal dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .info-item {
        padding: 0.5rem;
        border-radius: 4px;
        background-color: #f8f9fa;
    }
    .info-item:hover {
        background-color: #e9ecef;
    }
    .card-header {
        font-weight: 600;
    }
</style>
@endsection