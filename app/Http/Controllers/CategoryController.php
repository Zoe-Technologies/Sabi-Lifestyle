<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.categories.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => ['required', 'unique:categories'],
            'image' => ['required', 'mimes:jpg,png,jpeg,mp4']
        ]);

        $img_dir = $request->file('image')->store('images/category', 'public');

        $category = Category::create([
            'name' => $request->input('name'),
            'image' => $img_dir
        ]);

        return redirect(route('dashboard.admin.category.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $user = auth()->user();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('user', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $valid = $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($category)],
            'image' => 'mimes:jpg,png,jpeg,mp4'
        ]);

        if ($request->hasFile('image')) {
            $category->update(array_merge($valid, ['image' => $request->file('image')->store('images/category', 'public')]));
        } else {
            $category->update(array_merge($valid));
        }
        return redirect()->intended(route('dashboard.admin.category.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'Message deleted Successfully');
    }
}
