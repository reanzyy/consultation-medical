@section('title', 'List Specialists')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            List Specialists
        @endslot
        @slot('li_1')
            @slot('li_1_url')
                {{ route('specialists.index') }}
            @endslot
            Specialist
        @endslot
        @slot('li_2')
            @slot('li_2_active')
                active
            @endslot
            List Specialists
        @endslot
        @slot('action_button')
            <button type="button" data-bs-toggle="modal" data-bs-target="#formAdd" class="btn btn-primary d-block">
                <i class="bx bx-plus"></i> Add New Specialist
            </button>
        @endslot
    @endcomponent

    <x-alert />

    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialists as $specialist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $specialist->name }}</td>
                                        <td class="text-end">
                                            <div class="d-flex gap-1">
                                                <button type="button" class="btn btn-sm btn-warning btn-edit"
                                                    data-bs-toggle="modal" data-bs-target="#formEditModal"
                                                    data-id="{{ $specialist->id }}" data-name="{{ $specialist->name }}">
                                                    <i class="bx bx-edit-alt"></i>Edit
                                                </button>
                                                <button type="button"
                                                    data-action="{{ route('specialists.destroy', $specialist->id) }}"
                                                    data-confirm-text="Are you sure you want to delete this specialist data?"
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
    <div class="modal fade" id="formAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('specialists.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form create specialist</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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
                    </div>
                    <div class="modal-footer flex justify-content-between">
                        <span>
                            <strong class="text-danger">*</strong> Required
                        </span>
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('after-body')
    <div class="modal fade" id="formEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="formEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="" id="formEdit" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="formEditModalLabel">Form Edit Specialist</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="hidden" name="id" id="data-id">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="data-name"
                                    value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex justify-content-between">
                        <span>
                            <strong class="text-danger">*</strong> Required
                        </span>
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                $('#formEdit').attr('action', 'specialists/' + id);
                $('#data-id').val(id);
                $('#data-name').val(name);

                $('#formEditModal').modal('show');
            });
        });
    </script>
@endpush
