<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allCategories'] = Category::select('id', 'name', 'status', 'parent_category_id')->get();
        $data['categories'] = DB::table('categories as cat')
                                    ->leftJoin('categories as subcat', 'cat.id' , 'subcat.parent_category_id')
                                    ->leftJoin('categories as sscat', 'subcat.id', 'sscat.parent_category_id')
                                    ->leftJoin('categories as ssscat', 'sscat.id', 'ssscat.parent_category_id')
                                    ->select(
                                        'cat.id as cat_id',
                                        'cat.name as cat_name',
                                        'cat.status as cat_status',
                                        'subcat.id as subcat_id',
                                        'subcat.name as subcat_name',
                                        'subcat.status as subcat_status',
                                        'sscat.id as sscat_id',
                                        'sscat.name as sscat_name',
                                        'sscat.status as sscat_status',
                                        'ssscat.id as ssscat_id',
                                        'ssscat.name as ssscat_name',
                                        'ssscat.status as ssscat_status'
                                    )->orderBy('cat_id')
                                    ->get();
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
            'parent_category_id'    => 'sometimes',
            'name'                  => 'required|string',
            'status'                => 'required',
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
            'parent_category_id'    => 'sometimes',
            'name'                  => 'required|string',
            'status'                => 'required',
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
