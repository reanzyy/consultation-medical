@section('title', 'Add Doctor')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Add Doctor
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('doctors.index') }}
            @endslot
            Doctors
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            Add Doctor
        @endslot
    @endcomponent


    <div class="d-flex align-items-center justify-content-center row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctors.store') }}" method="post">
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
                                <label class="col-lg-3 col-form-label">Specialists <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="specialist_id"
                                        class="form-select @error('specialist_id') is-invalid @enderror">
                                        <option>Choose data</option>
                                        @foreach ($specialists as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('specialist_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Working hours <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="time" name="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        value="{{ old('start_time') }}">
                                    <div class="invalid-feedback">
                                        @error('start_time')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <h6 style="margin-top: 10px">Until</h6>
                                </div>
                                <div class="col-lg-4">
                                    <input type="time" name="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        value="{{ old('end_time') }}">
                                    <div class="invalid-feedback">
                                        @error('end_time')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-lg-3 col-form-label">Price <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="number" name="price"
                                        class="form-control  @error('price') is-invalid @enderror"
                                        value="{{ old('price') }}">
                                    <div class="invalid-feedback">
                                        @error('price')
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
                                <a class="btn btn-secondary" href="{{ route('doctors.index') }}">Back</a>
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
