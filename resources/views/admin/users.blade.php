@extends('layouts.master')
@section('toolbar')
    <div class="d-flex flex-stack flex-wrap gap-4 w-100">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column gap-3 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">
                Dashboard</h1>
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
                <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboard</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <x-lucide-chevron-right class="tw-h-6 fs-4 text-gray-700 mx-n1"/>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">Analytics</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-3 gap-lg-5">
            <!--begin::Secondary button-->
            <div class="m-0">
                <a href="#"
                   class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4">
                    New Project
                </a>
            </div>
            <!--end::Secondary button-->
        </div>
        <!--end::Actions-->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-4">
               <div>
                   <h4>Manage Users</h4>
                   <p class="mb-0">
                       Below is a list of all the users in the system. You can add, edit, or delete users here.
                   </p>

               </div>
              <div class="d-flex align-items-center gap-3">
                  <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                      <x-lucide-plus class="me-1 tw-h-5"/>
                      New User
                  </button>
                  <livewire:export-button button-name="Export Users" class="btn btn-sm btn-success mt-0" :table-id="$dataTable->getTableId()" />
              </div>
            </div>

            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
