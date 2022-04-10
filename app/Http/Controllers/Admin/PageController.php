<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::select('id', 'url', 'title', 'status', 'content')->get();
        return view('admin.page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $validateData = $request->validated();

        if ( Page::create($validateData) ) {
            notify()->success('Page created successfully!');
            return redirect(route('page.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('page.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $validateData = $request->validated();

        $page->title = $validateData['title'];
        $page->content = $validateData['content'];
        $page->status = $validateData['status'];
        $page->url = $validateData['url'];

        if ( $page->save() ) {
            notify()->success('Page updated successfully!');
            return redirect(route('page.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('page.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if ( $page->delete() ) {
            notify()->success('Page deleted successfully!');
            return redirect(route('page.index'));
        }
    }
}
