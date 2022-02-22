<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderGroupRequest;
use App\Http\Requests\UpdateSliderGroupRequest;
use App\Models\SliderGroup;

class SliderGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slidergroup.index');
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
    public function store(StoreSliderGroupRequest $request)
    {
        //
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
    public function update(UpdateSliderGroupRequest $request, SliderGroup $sliderGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderGroup  $sliderGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderGroup $sliderGroup)
    {
        //
    }
}
