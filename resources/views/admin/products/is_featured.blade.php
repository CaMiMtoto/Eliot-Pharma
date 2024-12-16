<div class="form-check form-switch">
    <input class="form-check-input js-toggle-featured" {{ $product->is_featured ? 'checked' : '' }}
           data-url="{{ route('admin.products.toggle-featured',$product->id) }}" type="checkbox" role="switch"
           id="flexSwitchCheckDefault_{{$product->id}}">
    <label class="form-check-label" for="flexSwitchCheckDefault_{{$product->id}}">
        {{ $product->is_featured ? 'Yes' : 'No' }}
    </label>
</div>
