<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::with('parent')->select('id', 'name', 'status', 'parent_category_id')->get();
        // return $data;
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'parent_category_id' => 'sometimes',
            'name' => 'required|string',
            'status' => 'required',
        ]);

        // return $validateData;

        if (Category::create($validateData)) {
            notify()->success('Category created successfully!');
            return redirect(route('category.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('category.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $validateData = $request->validate([
            'parent_category_id' => 'sometimes',
            'name' => 'required|string',
            'status' => 'required',
        ]);

        $category->parent_category_id = request('parent_category_id');
        $category->name = request('name');
        $category->status = request('status');

        if ($category->save()) {
            notify()->success('Category updated successfully!');
            return redirect(route('category.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('category.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
