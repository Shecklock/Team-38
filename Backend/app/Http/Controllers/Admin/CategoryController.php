<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;

// Created a category contorller class to controll all the functions of the category
//This controlls all create, edit, delete, update functions

class CategoryController extends Controller
{

    public function index() 
    {
        $category = category::all();
        return view ('admin.category.index')->with('category', $category);
    }

    public function create() 
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request) 
    {
        $input = $request->all();
        category::create($input);
        return redirect('admin/category/create')->with('flash_message', 'Category Addedd!');
    }

    public function show($CategoryID)
    {
        $category = category::find($CategoryID);
        return view('admin\category\show')->with('category', $category);
    }

    public function edit($CategoryID)
    {
        $category = category::find($CategoryID);
        return view('admin\category\edit')->with('category', $category);
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $category = Category::find($category);
        $input = $request->all();
        $category->update($input);
        return redirect()->route('admin/category/index')->with('success', 'Category updated successfully');
        
    }

    public function destroy($category)
    {
        category::destroy($category);
        return redirect()->route('admin/category/index')->with('success', 'CATEGORY DELETED');
           
    }


}