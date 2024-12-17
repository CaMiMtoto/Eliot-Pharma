<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws \Exception
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Category::query()->withCount('products'))
                ->addColumn('action', fn($category) => view('admin.categories.action',compact('category')))
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $request->input('id')],
            'description' => 'nullable|string|max:255',
            'is_featured'=>['nullable'],
        ], [
            'name.unique' => 'The category name must be unique.',
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name must be 255 characters or less.',
            'description.max' => 'The category description must be 255 characters or less.',
            'description.nullable' => 'The category description is required.',
            'description.string' => 'The category description must be a string.',
        ]);

        $id = $request->input('id');
        $data['slug'] = Str::slug($data['name']);
        $data['is_featured'] = $request->input('is_featured')=='on';
        if ($id) {
            $category = Category::find($id);
            $category->update($data);
        } else {
            $category = Category::create($data);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully.'], 200);
    }
}
