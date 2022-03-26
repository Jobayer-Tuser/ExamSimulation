<?php

namespace App\Http\Controllers\Admin;

use App\Models\SliderGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliderGroups'] = SliderGroup::select('id', 'slider_type', 'name')->get();
        return view('admin.slidergroup.index', $data);
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
     * @param  \App\Http\Requests\StoreSliderGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'slider_type' => 'required',
            'name' => 'required',
        ]);

        if ( SliderGroup::create($validateData) ) {
            notify()->success('Slider group type created successfully!');
            return redirect(route('slidergroup.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('slidergroup.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderGroup  $sliderGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SliderGroup $sliderGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderGroup  $sliderGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SliderGroup $sliderGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderGroupRequest  $request
     * @param  \App\Models\SliderGroup  $sliderGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SliderGroup $slidergroup)
    {
        $validateData = $request->validate([
            'slider_type' => 'required',
            'name' => 'required',
        ]);
        $slidergroup->slider_type = request('slider_type');
        $slidergroup->name = request('name');

        if ( $slidergroup->save() ) {
            notify()->success('Slider group type updated successfully!');
            return redirect(route('slidergroup.index'));
        } else {
            notify()->warning('Something is wrong please recheck!');
            return redirect(route('slidergroup.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderGroup  $sliderGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderGroup $slidergroup)
    {
        if ($slidergroup->delete()) {
            notify()->success('Slider group type delete successfully!');
            return redirect(route('slidergroup.index'));
        }
    }
}
