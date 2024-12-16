<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws \Exception
     */
    public function index()
    {
        if (request()->ajax()) {
            $source = Product::query()
                ->with('category');
            return DataTables::of($source)
                ->addIndexColumn()
                ->editColumn('price', fn(Product $product) =>number_format($product->price))
                ->editColumn('is_featured', fn(Product $product) => view('admin.products.is_featured', ['product' => $product])->render())
                ->addColumn('action', fn(Product $product) => view('admin.products.action', ['product' => $product])->render())
                ->rawColumns(['action', 'is_featured'])
                ->make(true);
        }

        $categories = Category::all();

        return view('admin.products.index', [
            'categories' => $categories
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->getRules(), $this->getValidationMessages());
        $id = \request('id');
        if ($id) {
            $product = Product::findOrFail($id);
        } else {
            $product = new Product();
        }

        $data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $IMAGE_PATH = Product::IMAGE_PATH;
            // Check if product has an existing image and delete it
            if ($product->image) {
                Storage::delete($IMAGE_PATH . $product->image);
            }
            // Store the new image and get the file path
            $path = Storage::putFile($IMAGE_PATH, $request->file('image'));
            info($path);
            // Get the basename (file name only) and assign it to the product's image field
            $data['image'] = basename($path);
        }

        $product->fill($data);
        $product->save();

        if (\request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product has been created!',
                'data' => $product,
            ], ResponseAlias::HTTP_CREATED);
        }

        return redirect()->back()->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $path = Product::IMAGE_PATH . $product->image;
        $product->delete();
        Storage::delete($path);
        if (\request()->ajax()) {
            return response()->noContent();
        }
        return redirect()->back()->with('success', 'Product has been deleted!');
    }

    /**
     * @return string[]
     */
    public function getValidationMessages(): array
    {
        return [
            'price.min' => 'Price must be greater than 0',
            'stock.min' => 'Stock must be greater than 0',
            'discount_percentage.max' => 'Discount percentage must be less than or equal to 100',
            'discount_percentage.min' => 'Discount percentage must be greater than 0',
            'discount_percentage.numeric' => 'Discount percentage must be numeric',
            'image' => 'Image is required',
            'image.required_if' => 'Image is required',
            'category_id.required' => 'Category is required',
        ];
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return [
            'name' => ['required', 'unique:products,name,' . \request('id')],
            'category_id' => 'required',
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'is_featured' => ['nullable'],
            'image' => ['image', 'required_if:id,0'],
            'discount_percentage' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function toggleFeatured(Product $product)
    {
        $product->is_featured = !$product->is_featured;
        $product->save();
        return $product;
    }
}
