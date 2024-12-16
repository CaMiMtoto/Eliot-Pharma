<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
       More
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item js-edit" href="{{ route('admin.products.show',$product->id) }}">Edit</a></li>
        <li><a class="dropdown-item js-delete" href="{{ route('admin.products.destroy',$product->id) }}">Delete</a></li>
    </ul>
</div>
