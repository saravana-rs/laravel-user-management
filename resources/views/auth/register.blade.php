@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Register</h4>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Basic Information</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="user_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                                           id="user_name" name="user_name" value="{{ old('user_name') }}" >
                                    @error('user_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" 
                                           id="mobile" name="mobile" value="{{ old('mobile') }}" >
                                    @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" 
                                           id="dob" name="dob" value="{{ old('dob') }}" >
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" >
                                        <option value="">Select</option>
                                        <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
                                        <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
                                        <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" >
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Home Address</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="home_door_street" class="form-label">Door/Street</label>
                                    <input type="text" class="form-control @error('address1.door_street') is-invalid @enderror" 
                                           id="home_door_street" name="address1[door_street]" value="{{ old('address1.door_street') }}" >
                                    @error('address1.door_street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('address1.city') is-invalid @enderror" 
                                           id="home_city" name="address1[city]" value="{{ old('address1.city') }}" >
                                    @error('address1.city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_landmark" class="form-label">Landmark</label>
                                    <input type="text" class="form-control @error('address1.landmark') is-invalid @enderror" 
                                           id="home_landmark" name="address1[landmark]" value="{{ old('address1.landmark') }}">
                                    @error('address1.landmark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="home_state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('address1.state') is-invalid @enderror" 
                                           id="home_state" name="address1[state]" value="{{ old('address1.state') }}" >
                                    @error('address1.state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="home_country" class="form-label">Country</label>
                                    <input type="text" class="form-control @error('address1.country') is-invalid @enderror" 
                                           id="home_country" name="address1[country]" value="{{ old('address1.country') }}" >
                                    @error('address1.country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="home_primary" 
                                               name="address1[primary]" value="1" {{ old('address1.primary') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="home_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Work Address (Optional)</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="work_door_street" class="form-label">Door/Street</label>
                                    <input type="text" class="form-control @error('address2.door_street') is-invalid @enderror" 
                                           id="work_door_street" name="address2[door_street]" value="{{ old('address2.door_street') }}">
                                    @error('address2.door_street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('address2.city') is-invalid @enderror" 
                                           id="work_city" name="address2[city]" value="{{ old('address2.city') }}">
                                    @error('address2.city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_landmark" class="form-label">Landmark</label>
                                    <input type="text" class="form-control @error('address2.landmark') is-invalid @enderror" 
                                           id="work_landmark" name="address2[landmark]" value="{{ old('address2.landmark') }}">
                                    @error('address2.landmark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="work_state" class="form-label">State</label>
                                    <input type="text" class="form-control @error('address2.state') is-invalid @enderror" 
                                           id="work_state" name="address2[state]" value="{{ old('address2.state') }}">
                                    @error('address2.state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="work_country" class="form-label">Country</label>
                                    <input type="text" class="form-control @error('address2.country') is-invalid @enderror" 
                                           id="work_country" name="address2[country]" value="{{ old('address2.country') }}">
                                    @error('address2.country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="work_primary" 
                                               name="address2[primary]" value="1" {{ old('address2.primary') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="work_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Register</button>
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary px-4">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            }
        });
    });
});
</script>
@endpush