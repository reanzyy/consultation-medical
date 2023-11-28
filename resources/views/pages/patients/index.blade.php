@section('title', 'List Patients')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            List Patients
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('patients.index') }}
            @endslot
            Patient
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            List Patients
        @endslot
        @slot('action_button')
            <a href="{{ route('patients.create') }}" class="btn btn-primary d-block">
                <i class="bx bx-plus"></i> Add New Patient Data
            </a>
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
                                    <th>Phone</th>
                                    <th width="22%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td class="text-end">
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('patients.edit', $patient->id) }}">
                                                    <i class="bx bx-edit-alt"></i>Edit
                                                </a>
                                                <button type="button"
                                                    data-action="{{ route('patients.destroy', $patient->id) }}"
                                                    data-confirm-text="Are you sure you want to delete this patient data?"
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
