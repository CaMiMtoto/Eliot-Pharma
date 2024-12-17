@extends('layouts.master')
@section('title','Working Hours')
@section('toolbar')
    <div class="d-flex flex-stack flex-wrap gap-4 w-100">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column gap-3 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                Working Hours
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                    <a href="" class="text-gray-500">
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
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Manage Working Hours</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-3 gap-lg-5">
            <!--begin::Secondary button-->
            <div class="m-0">
                <button type="button" id="addBtn"
                        class="btn btn-flex btn-sm btn-light-primary  fw-bold px-4">
                    <x-lucide-plus class="tw-h-5"/>
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
        <div>
            <h4>
                All Working Hours
            </h4>
            <p>
                Manage all your working hours here.
            </p>
        </div>
        <div class="table-responsive">
            <table class="table ps-2 align-middle border rounded table-row-dashed fs-6 g-2" id="myTable">
                <thead>
                <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                    <th></th>
                    <th>Day</th>
                    <th>Opening Time</th>
                    <th>Closing Time</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>



    <!-- Modal -->

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Working Hour</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="{{ route('admin.working-hours.store') }}" id="submit-form" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="working_hour_id" value="0"/>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="day" class="form-label">Day</label>
                            <select class="form-select" id="day" name="day">
                                <option value="">Select Day</option>
                                @foreach($days as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="opening_time" class="form-label">Opening Time</label>
                            <select class="form-select" id="opening_time" name="opening_time">
                                <option value="">Select Time</option>
                                @foreach($hours as $hour)
                                    <option value="{{ $hour }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="closing_time" class="form-label">Closing Time</label>
                            <select class="form-select" id="closing_time" name="closing_time">
                                <option value="">Select Time</option>
                                @foreach($hours as $hour)
                                    <option value="{{ $hour }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            const myModal = new bootstrap.Modal(document.getElementById('addModal'), {});
            $('#addBtn').on('click', function () {
                $('#submit-form')[0].reset();
                $('#working_hour_id').val(0);
                myModal.show();
            });
            window.dt = $('#myTable').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                ajax: {
                    url: "{!! request()->fullUrl() !!}",
                    type: 'GET',
                    dataSrc: ""
                },
                language: {
                    loadingRecords: '&nbsp;',
                    processing: '<div class="spinner spinner-primary spinner-lg mr-15"></div> Processing...'
                },
                columns: [
                    {data:'day_of_week', name: 'day_of_week',visible: false},
                    {
                        data: 'day', name: 'day',
                        render: function (data) {
                            return data;
                        }
                    },
                    {data: 'opening_time', name: 'opening_time'},
                    {data: 'closing_time', name: 'closing_time'},
                    {
                        data: 'id', name: 'id', orderable: false, searchable: false,
                        render: function (data, type, row) {
                            return `<a href="${row.edit_url}" class="btn btn-sm btn-light-primary btn-icon rounded-pill tw-h-10 tw-w-10 d-inline-flex align-items-center justify-content-center  fw-bold"><x-lucide-edit class="tw-h-5 tw-w-5"/></a>
                            <a href="${row.delete_url}" class="btn btn-sm btn-light-danger btn-icon rounded-pill tw-h-10 tw-w-10 d-inline-flex align-items-center justify-content-center  fw-bold js-delete">
                                    <x-lucide-trash class="tw-h-5 tw-w-5"/></a>`;
                        }
                    },

                ],
                order: [[0, 'asc']]
            });

            const $submitForm = $('#submit-form');
            $submitForm.submit(function (e) {
                e.preventDefault();
                let $this = $(this);
                let formData = new FormData(this);
                let id = $('#id').val();
                let url = $this.attr('action');
                let btn = $(this).find('[type="submit"]');
                btn.prop('disabled', true);
                btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
                // remove the error text
                $this.find('.error').remove();
                // remove the error class
                $this.find('.is-invalid').removeClass('is-invalid');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        dt.ajax.reload();
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Record has been saved successfully.',
                        });

                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                let $1 = $('#' + key);
                                $1.addClass('is-invalid');
                                // create span element under the input field with a class of invalid-feedback and add the error text returned by the validator
                                $1.parent().append('<span class="text-danger error">' + value[0] + '</span>');
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON?.error ?? 'Something went wrong! Please try again.'
                            });
                        }
                    },
                    complete: function () {
                        btn.prop('disabled', false);
                        btn.html('Save changes');
                    }
                });
            });
        });
    </script>
@endpush
