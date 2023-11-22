@section('title', 'List Doctors')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            List Doctors
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('doctors.index') }}
            @endslot
            Doctor
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            List Doctors
        @endslot
        @slot('action_button')
            <a href="{{ route('doctors.create') }}" class="btn btn-primary d-block">
                <i class="bx bx-plus"></i> Add New Doctor Data
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
                                    <th>Specialist</th>
                                    <th>Working hours</th>
                                    <th>Price</th>
                                    <th>Phone</th>
                                    <th width="22%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->specialist->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($doctor->start_time)->format('H:i') . ' - ' . Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                        </td>
                                        <td>{{ 'IDR. ' . number_format($doctor->price) }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td class="text-end">
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('doctors.edit', $doctor->id) }}">
                                                    <i class="bx bx-edit-alt"></i>Edit
                                                </a>
                                                <button type="button"
                                                    data-action="{{ route('doctors.destroy', $doctor->id) }}"
                                                    data-confirm-text="Are you sure you want to delete this doctor data?"
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
