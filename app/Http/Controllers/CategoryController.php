<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }
    
    public function store(StoreCategoryRequest $request)
    {
        $categories = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('categories.index')
        -> with('message', 'Create  Category successfully');
    }
}
