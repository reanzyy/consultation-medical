@section('title', 'List Hospitals')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            List Hospitals
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('hospitals.index') }}
            @endslot
            Doctor
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            List Hospitals
        @endslot
        @slot('action_button')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateHospitals">
                <i class="bx bx-plus"></i> Create New Hospital Data
            </button>
        @endslot
    @endcomponent

    <x-alert />

    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" style="width: 115%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th width="22%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hospital->name }}</td>
                                        <td>{{ $hospital->address }}</td>
                                        <td class="text-end">
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-sm btn-warning d-flex edit-button"
                                                    data-bs-toggle="modal" data-bs-target="#modalEditHospitals"
                                                    data-hospital-id="{{ $hospital->id }}"
                                                    data-hospital-name="{{ $hospital->name }}"
                                                    data-hospital-address="{{ $hospital->address }}">
                                                    <i class="bx bx-edit-alt"></i> Edit
                                                </button>
                                                <button type="button"
                                                    data-action="{{ route('hospitals.destroy', $hospital->id) }}"
                                                    data-confirm-text="Are you sure you want to delete this hospital data?"
                                                    class="btn btn-sm btn-danger btn-delete">
                                                    <i class="bx bx-trash"></i>Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-body')
    <div class="modal fade" id="modalCreateHospitals" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalCreateHospitalsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateHospitalsLabel">Create New Hospital Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('hospitals.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
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
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }} </textarea>
                                <div class="invalid-feedback">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between border-top">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Required
                        </span>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditHospitals" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalEditHospitalsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditHospitalsLabel">Edit Hospital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="edit-hospitals-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" id="edit-hospitals-name"
                                    class="form-control @error('name') is-invalid @enderror">
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
                                <textarea name="address" id="edit-hospitals-address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $Doctor->address ?? '') }}</textarea>
                                <div class="invalid-feedback">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between border-top">
                            <span class="text-muted float-start">
                                <strong class="text-danger">*</strong> Required
                            </span>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#modalCreateHospitalsButton').click(function() {
                $('#modalCreateHospitals').modal('show');
            });

            $('.edit-button').click(function() {
                var hospitalId = $(this).data('hospital-id');
                var hospitalName = $(this).data('hospital-name');
                var hospitalAddress = $(this).data('hospital-address');

                $('#edit-hospitals-form').attr('action', 'hospitals/' + hospitalId);
                $('#edit-hospitals-name').val(hospitalName);
                $('#edit-hospitals-address').val(hospitalAddress);
            });

            $('#modalEditHospitals').on('hidden.bs.modal', function() {
                $('#edit-hospitals-form').attr('action', '');
                $('#edit-hospitals-name').val('');
                $('#edit-hospitals-address').val('');
            });
        });
    </script>
@endpush
