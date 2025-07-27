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

                    <form method="POST" action="{{ route('admin.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Basic Information</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="user_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                           id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" >
                                    @error('user_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email', $user->email) }}" >
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror"
                                           id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}" >
                                    @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                           id="dob" name="dob" value="{{ old('dob', $user->dob) }}" >
                                    @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="">Select</option>
                                        <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        @php $home = json_decode($user->address1 ?? '{}', true); @endphp
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Home Address</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Door/Street</label>
                                    <input type="text" name="address1[door_street]" class="form-control @error('address1.door_street') is-invalid @enderror"
                                           value="{{ old('address1.door_street', $home['door_street'] ?? '') }}" >
                                    @error('address1.door_street') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">City</label>
                                    <input type="text" name="address1[city]" class="form-control @error('address1.city') is-invalid @enderror"
                                           value="{{ old('address1.city', $home['city'] ?? '') }}" >
                                    @error('address1.city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Landmark</label>
                                    <input type="text" name="address1[landmark]" class="form-control @error('address1.landmark') is-invalid @enderror"
                                           value="{{ old('address1.landmark', $home['landmark'] ?? '') }}" >
                                    @error('address1.landmark') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="address1[state]" class="form-control @error('address1.state') is-invalid @enderror"
                                           value="{{ old('address1.state', $home['state'] ?? '') }}" >
                                    @error('address1.state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="address1[country]" class="form-control @error('address1.country') is-invalid @enderror"
                                           value="{{ old('address1.country', $home['country'] ?? '') }}" >
                                    @error('address1.country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="home_primary"
                                               name="address1[primary]" value="1"
                                               {{ old('address1.primary', $home['primary'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="home_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php $work = json_decode($user->address2 ?? '{}', true); @endphp
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Work Address</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Door/Street</label>
                                    <input type="text" name="address2[door_street]" class="form-control @error('address2.door_street') is-invalid @enderror"
                                           value="{{ old('address2.door_street', $work['door_street'] ?? '') }}">
                                    @error('address2.door_street') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">City</label>
                                    <input type="text" name="address2[city]" class="form-control @error('address2.city') is-invalid @enderror"
                                           value="{{ old('address2.city', $work['city'] ?? '') }}">
                                    @error('address2.city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Landmark</label>
                                    <input type="text" name="address2[landmark]" class="form-control @error('address2.landmark') is-invalid @enderror"
                                           value="{{ old('address2.landmark', $work['landmark'] ?? '') }}">
                                    @error('address2.landmark') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="address2[state]" class="form-control @error('address2.state') is-invalid @enderror"
                                           value="{{ old('address2.state', $work['state'] ?? '') }}">
                                    @error('address2.state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="address2[country]" class="form-control @error('address2.country') is-invalid @enderror"
                                           value="{{ old('address2.country', $work['country'] ?? '') }}">
                                    @error('address2.country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="work_primary"
                                               name="address2[primary]" value="1"
                                               {{ old('address2.primary', $work['primary'] ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="work_primary">Primary Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
