<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'text' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->text = $request->text;
        $category->save();
        return redirect()->route('admin.category')->with('success', 'تم إضافة القسم بنجاح');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'text' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->text = $request->text;
        $category->save();
        return redirect()->route('admin.category')->with('success', 'تم تعديل القسم بنجاح');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'تم حذف القسم بنجاح');
    }
}
