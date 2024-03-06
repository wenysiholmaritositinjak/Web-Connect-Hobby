<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function indexAPI()
    {
        $categories = Category::all();
        return response()->json(['data'=>$categories]);
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('Category.index', compact('categories'));
    }

    public function showAPI($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(['data' => $category]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
    

    public function create()
    {
        return view('Category.create');
    }

    public function store(CategoryFormRequest $request)
    {
    $validatedData = $request->validated();
    $categoryName = $validatedData['name'];
    $existingCategory = Category::where('name', $categoryName)->exists();

    if ($existingCategory) {
        return redirect()->back()->withInput()->with('warning', 'Kategori dengan nama yang sama sudah ada!');
    }

    $slug = Str::slug($categoryName);
    $code = random_int(10, 99);
    $slug = $slug . '-' . $code;

    $category = new Category;
    $category->name = $categoryName;
    $category->slug = $slug;

    $category->save();

    return redirect('/categories')->with('messages', 'Category berhasil ditambahkan');
    }

    public function edit(Category $category){
        return view('Category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->update(); // Simpan perubahan pada model Category
        return redirect('/categories')->with('messages', 'Category berhasil diupdate');
    }

    public function destroy(int $category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->back()->with('messages', 'Category berhasil dihapus');
    }
}
