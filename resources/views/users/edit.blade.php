@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

<!-- @php
  $address1 = json_decode($user->address1, true);
@endphp -->
                    <div class="mb-4">
                            <h5 class="border-bottom pb-2">Basic Information</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="user_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                                           id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" >
                                    @error('user_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" 
                                           id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}" >
                                    @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" 
                                           id="dob" name="dob" value="{{ old('dob', $user->dob) }}" >
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" >
                                        <option value="">Select</option>
                                        <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Home Address</h5>
                            @php $home = json_decode($user->address1 ?? '{}', true); @endphp
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="home_door_street" class="form-label">Door/Street</label>
                                    <input type="text" class="form-control @error('home_door_street') is-invalid @enderror" 
                                           id="home_door_street" name="address1[door_street]" value="{{ old('home_door_street', $home['door_street'] ?? '') }}" >
                                    @error('home_door_street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('home_city') is-invalid @enderror" 
                                           id="home_city" name="address1[city]" value="{{ old('home_city', $home['city'] ?? '') }}" >
                                    @error('home_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_landmark" class="form-label">Landmark</label>
                                    <input type="text" class="form-control @error('home_landmark') is-invalid @enderror" 
                                           id="home_landmark" name="address1[landmark]" value="{{ old('home_landmark', $home['landmark'] ?? '') }}">
                                    @error('home_landmark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('home_state') is-invalid @enderror" 
                                           id="home_state" name="address1[state]" value="{{ old('home_state', $home['state'] ?? '') }}" >
                                    @error('home_state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="home_country" class="form-label">Country</label>
                                    <input type="text" class="form-control @error('home_country') is-invalid @enderror" 
                                           id="home_country" name="address1[country]" value="{{ old('home_country', $home['country'] ?? '') }}" >
                                    @error('home_country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="home_primary" 
                                               name="address1[primary]" value="1" {{ !empty($home['primary']) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="home_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Work Address</h5>
                            @php $work = json_decode($user->address2 ?? '{}', true); @endphp
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="work_door_street" class="form-label">Door/Street</label>
                                    <input type="text" class="form-control @error('work_door_street') is-invalid @enderror" 
                                           id="work_door_street" name="address2[door_street]" value="{{ old('work_door_street', $work['door_street'] ?? '') }}">
                                    @error('work_door_street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('work_city') is-invalid @enderror" 
                                           id="work_city" name="address2[city]" value="{{ old('work_city', $work['city'] ?? '') }}">
                                    @error('work_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_landmark" class="form-label">Landmark</label>
                                    <input type="text" class="form-control @error('work_landmark') is-invalid @enderror" 
                                           id="work_landmark" name="address2[landmark]" value="{{ old('work_landmark', $work['landmark'] ?? '') }}">
                                    @error('work_landmark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('work_state') is-invalid @enderror" 
                                           id="work_state" name="address2[state]" value="{{ old('work_state', $work['state'] ?? '') }}">
                                    @error('work_state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="work_country" class="form-label">Country</label>
                                    <input type="text" class="form-control @error('work_country') is-invalid @enderror" 
                                           id="work_country" name="address2[country]" value="{{ old('work_country', $work['country'] ?? '') }}">
                                    @error('work_country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="work_primary" 
                                               name="work_primary" value="1" {{ !empty($work['primary']) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="work_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection