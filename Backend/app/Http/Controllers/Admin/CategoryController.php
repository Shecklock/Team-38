<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{

    public function index() 
    {
        return view('admin.category.index');
    }

    public function create() 
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request) 
    {
        $validatedData = $request->validate([
            'CategoryName' => 'required|string|max:255',
        ]);

        $category = new Category($validatedData);
        $category->save();

        return redirect('/admin/category');
    }

}