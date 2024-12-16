@extends('layouts.master')
@section('title','Products')
@section('toolbar')
    <div class="d-flex flex-stack flex-wrap gap-4 w-100">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column gap-3 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                Products
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
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Manage Products</li>
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
                All Products
            </h4>
            <p>
                Manage all your products here.
            </p>
        </div>
        <div class="table-responsive">
            <table class="table ps-2 align-middle border rounded table-row-dashed fs-6 g-5" id="myTable">
                <thead>
                <tr class="text-start text-gray-800 fw-bold fs-7 text-uppercase">
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Is Featured</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>




    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="{{ route('admin.products.store') }}" id="submit-form" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="product_id" value="0"/>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                $('#product_id').val(0);
                myModal.show();
            });

            window.dt = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{!! request()->fullUrl() !!}",
                language: {
                    loadingRecords: '&nbsp;',
                    processing: '<div class="spinner spinner-primary spinner-lg mr-15"></div> Processing...'
                },
                columns: [
                    {
                        data: 'id', name: 'id',
                        render: function (data, type, row) {
                            return `<img src="${row.image_url}" alt="Image" class="img-fluid tw-h-10"/>`
                        }
                    },
                    {
                        data: 'created_at', name: 'created_at',
                        render: function (data) {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'price', name: 'price'},
                    {
                        data: 'is_featured', name: 'is_featured',
                        render: function (data, type, row) {
                            return `<span class="badge bg-${row.status_color}-subtle rounded-pill text-${row.status_color}">${data}</span>`;
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ],
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

            $(document).on('click', '.js-edit', function (e) {
                e.preventDefault();
                const url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $('#product_id').val(data.id);
                        $('#name').val(data.name);
                        $('#description').val(data.description);
                        $('#price').val(data.price);
                        $('#stock').val(data.stock);
                        $('#category_id').val(data.category_id);
                        $('#addModal').modal('show');
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.js-toggle-featured', function (e) {
                e.preventDefault();
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (data) {
                        console.log(data);
                        dt.ajax.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

    </script>

@endpush
