<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::select('id', 'title')->get();
        $data['seos']  = Seo::all();
        return view('admin.seo.index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'page_id' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        if ( Seo::create($validateData) ) {
            notify()->success('Seo for page created successfully!');
            return redirect(route('seo.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('seo.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seo $seo)
    {
        $validateData = $request->validate([
            'page_id' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        $seo->page_id = request('page_id');
        $seo->meta_title = request('meta_title');
        $seo->meta_keyword = request('meta_keyword');
        $seo->meta_description = request('meta_description');

        if ( $seo->save() ) {
            notify()->success('Seo for page updated successfully!');
            return redirect(route('seo.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('seo.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo $seo)
    {
        if ( $seo->delete() ) {
            notify()->success('Seo for page updated successfully!');
            return redirect(route('seo.index'));
        } else {
            notify()->warning('Something is wrong please recheck your sep page is connected to page!');
            return redirect(route('seo.index'));
        }
    }
}
