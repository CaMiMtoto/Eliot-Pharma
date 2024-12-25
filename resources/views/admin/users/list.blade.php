@extends('layouts.master')
@section('title', 'Users')
@section('toolbar')
    <div class="d-flex flex-stack flex-wrap gap-4 w-100">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column gap-3 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                System Users
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-500">
                        <x-lucide-home class=" fs-3 text-gray-400 me-n1 tw-h-6"/>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <x-lucide-chevron-right class="tw-h-6 fs-4 text-gray-700 mx-n1"/>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Manage Users</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-3 gap-lg-5">
            <!--begin::Secondary button-->
            <div class="m-0">
                <button type="button" class="btn btn-sm btn-light-primary px-4 py-3" id="addBtn">
                    <i class="bi bi-plus fs-3"></i>
                    Add New
                </button>
            </div>
            <!--end::Secondary button-->
        </div>
        <!--end::Actions-->
    </div>
@endsection
@section('content')
    <div class="card card-body">

        <!--begin::Content-->
        <div class="my-3">
            <div class="table-responsive">
                <table class="table ps-2 align-middle border rounded table-row-dashed fs-6 g-5" id="myTable">
                    <thead>
                    <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--end::Content-->
    </div>


    <div class="modal fade" tabindex="-1" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        User
                    </h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <i class="bi bi-x"></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('admin.system.users.store') }}" id="submitForm" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id" value="0"/>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""/>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""/>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder=""/>
                        </div>


                        <h6>
                            Roles
                        </h6>

                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-md-6">
                                    <div class="form-check my-2">
                                        <input class="form-check-input" type="checkbox" value="{{ $role->id }}"
                                               name="roles[]"
                                               id="role_{{ $role->id }}">
                                        <label class="form-check-label" for="role_{{ $role->id }}">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>

                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn bg-secondary text-light-emphasis" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            let myTable = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! request()->fullUrl() !!}",
                language: {
                    loadingRecords: '&nbsp;',
                    processing: '<div class="spinner spinner-primary spinner-lg mr-15"></div> Processing...'
                },
                columns: [
                    {data: 'id', name: 'id',visible: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone_number', name: 'phone_number'},
                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function (data) {
                            if (data === 1) {
                                return '<span class="badge badge-light-success">Active</span>';
                            } else {
                                return '<span class="badge badge-light-danger">Inactive</span>';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        class: 'text-center',
                        width: '15%'
                    },
                ],
                order: [[0, 'desc']]
            });

            $('#addBtn').click(function () {
                $('#myModal').modal('show');
            });
            $('#myModal').on('hidden.bs.modal', function () {
                $('#submitForm').trigger('reset');
                $('#id').val(0);
            });

            let submitForm = $('#submitForm');
            submitForm.submit(function (e) {
                e.preventDefault();
                let $this = $(this);
                let formData = new FormData(this);
                let id = $('#id').val();
                let url = $this.attr('action');
                let btn = $(this).find('[type="submit"]');
                btn.prop('disabled', true);
                btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
                // remove the error text
                $this.find('.invalid-feedback').remove();
                // remove the error class
                $this.find('.is-invalid').removeClass('is-invalid');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        myTable.ajax.reload();
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Record has been saved successfully.',
                            // showConfirmButton: false,
                            // timer: 1500
                        });

                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                let $1 = $('#' + key);
                                $1.addClass('is-invalid');
                                // create span element under the input field with a class of invalid-feedback and add the error text returned by the validator
                                $1.parent().append('<span class="invalid-feedback">' + value[0] + '</span>');
                            });
                        }
                    },
                    complete: function () {
                        btn.prop('disabled', false);
                        btn.html('Save changes');
                    }
                });
            });

            $(document).on('click', '.js-edit', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = '{{ route('admin.system.users.show', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $('#id').val(data.id);
                        $('#job_title').val(data.job_title);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $.each(data.roles, function (key, value) {
                            $('#role_' + value.id).prop('checked', true);
                        });
                        $('#myModal').modal('show');
                    }
                });
            });
        });
    </script>
@endpush