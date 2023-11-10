@section('title', 'List Users')

@extends('layouts.main')

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            List Users
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
            List Users
        @endslot
        @slot('action_button')
            <a href="{{ route('users.create') }}" class="btn btn-primary d-block">
                <i class="bx bx-plus"></i> Add New User Data
            </a>
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="22%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @switch($user->role)
                                                @case('admin')
                                                    <span class="badge rounded-pill bg-success">
                                                        Admin
                                                    </span>
                                                @break

                                                @case('consultan')
                                                    <span class="badge rounded-pill bg-primary">
                                                        Patient
                                                    </span>
                                                @break

                                                @case('doctor')
                                                    <span class="badge rounded-pill bg-info">
                                                        Doctor
                                                    </span>
                                                @break

                                                @default
                                                    -
                                            @endswitch
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex gap-1">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('users.edit', $user->id) }}">
                                                    <i class="bx bx-edit-alt"></i>Edit
                                                </a>
                                                @if ($currentId != $user->id)
                                                    <button type="button"
                                                        data-action="{{ route('users.destroy', $user->id) }}"
                                                        data-confirm-text="Are you sure you want to delete this user data?"
                                                        class="btn btn-sm btn-danger btn-delete">
                                                        <i class="bx bx-trash"></i>Delete
                                                    </button>
                                                @endif
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
