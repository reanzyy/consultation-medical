@section('title', 'Edit User')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Edit User
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('users.index') }}
            @endslot
            Users
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            Edit User
        @endslot
    @endcomponent

    <x-alert />

    <div class="d-flex align-items-center justify-content-center row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}">
                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Role <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control"
                                        @switch($user->role)
                                    @case('admin')
                                        value="Admin"
                                    @break

                                    @case('consultan')
                                        value="Patient"
                                    @break

                                    @case('doctor')
                                        value="Doctor"
                                    @break

                                    @default
                                        -
                                @endswitch>
                                </div>
                            </div>
                            @if ($user->role != 'employee')
                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <small class="text-muted">Leave it blank if you don't want to change the
                                            password</small>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-lg-3 col-form-label">New Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        <div class="invalid-feedback">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-lg-3 col-form-label">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        <div class="invalid-feedback">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-end border-top">
                            <span class="text-muted float-start">
                                <strong class="text-danger">*</strong> Required
                            </span>
                            <div class="float-end">
                                <a class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
