<div class="d-flex flex-shrink-0 gap-2">
    <a class="btn btn-icon btn-light-primary btn-sm rounded-2 js-edit"
       href="{{ route('admin.system.roles.show', $role->id) }}">
        <x-lucide-edit class="tw-w-5 tw-h-5"/>
    </a>
    <a class="btn btn-icon btn-light-danger btn-icon btn-sm rounded-2 js-delete"
       href="{{ route('admin.system.roles.destroy', $role->id) }}">
        <x-lucide-trash class="tw-w-5 tw-h-5"/>
    </a>
</div>
