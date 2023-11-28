@section('title', 'Add Patient')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Add Patient
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('patients.index') }}
            @endslot
            Patients
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            Add Patient
        @endslot
    @endcomponent


    <div class="d-flex align-items-center justify-content-center row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="post">
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
                                <label class="col-lg-3 col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" rows="5">{{ old('address') }}</textarea>
                                    <div class="invalid-feedback">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Phone <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="number" name="phone"
                                        class="form-control  @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}">
                                    <div class="invalid-feedback">
                                        @error('phone')
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
                                <a class="btn btn-secondary" href="{{ route('patients.index') }}">Back</a>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
