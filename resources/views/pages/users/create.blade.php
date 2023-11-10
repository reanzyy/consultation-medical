@section('title', 'Add User')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Add User
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
            Add User
        @endslot
    @endcomponent


    <div class="d-flex align-items-center justify-content-center row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
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
                                        value="{{ old('email') }}">
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
                                    <input type="text" disabled class="form-control" value="Admin">
                                    <div class="invalid-feedback">
                                        @error('role')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Password <span class="text-danger">*</span></label>
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
                                <label class="col-lg-3 col-form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
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
