@section('title', 'Edit Profile')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Edit Profile
        @endslot
        @slot('li_1')
            Profile
        @endslot
        @slot('li_2_active')
            active
        @endslot
        @slot('li_2')
        Edit Profile
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-9 offset-sm-1">
            <div class="card">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row mb-3 mb-3">
                            <label class="col-lg-3 col-form-label">Profile Photo</label>
                            <div class="col-lg-9">
                                <input type="file" name="photo" class="dropify" data-allowed-file-extensions="jpg png"
                                    data-default-file="{{ !empty($user->photo) ? \Storage::disk('public')->url($user->photo) : asset('/assets/img/avatars/user.jpg') }}" />
                                <div class="invalid-feedback">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                            <label class="col-lg-3 col-form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="password" name="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    @error('old_password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-lg-12">
                                <small class="text-muted">Leave it blank if you don't want to change the password</small>
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
                    </div>
                    <div class="card-footer border-top text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Required
                        </span>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Oops, something wrong happened.'
            },
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size:12px;">Drag and drop a file here or click</p></div>',
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton: '<button type="button" class="dropify-clear">Remove</button>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        });
    </script>
@endpush
