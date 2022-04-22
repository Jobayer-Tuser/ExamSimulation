<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\SliderGroup;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = Slider::with('sliderGroup')->select('id', 'title', 'target_link', 'target_type', 'sequence', 'status', 'slider_group_id')->get();
        return view('admin.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sliderGroups'] = SliderGroup::select('id', 'name')->get();
        return view('admin.slider.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $request = $request->validated();

        if (Slider::create($request)) {
            notify()->success('Slider created successfully!');
            return redirect(route('slider.index'));
        } else {
            notify()->warning('Slider is wrong please recheck!');
            return redirect(route('slider.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        $data['sliderGroups'] = SliderGroup::select('id', 'name')->get();
        return view('admin.slider.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $data['sliderGroups'] = SliderGroup::select('id', 'name')->get();
        $data['slider'] = $slider;
        return view('admin.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $request->validated();
        if(file_exists(public_path('storage/slider-image/'. $slider->file_name)) && $slider->file_name !==  $request->file_name ){
            unlink(public_path('storage/slider-image/' . $slider->file_name ));
        }

        $slider->slider_group_id= $request->slider_group_id;
        $slider->title          = $request->title;
        $slider->target_link    = $request->target_link;
        $slider->target_type    = $request->target_type;
        $slider->sequence       = $request->sequence;
        $slider->status         = $request->status;
        $slider->file_name      = $request->file_name;

        if($slider->save()){
            return redirect(route('slider.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect(route('slider.index'));
    }

    public function updateSliderStatus(Slider $slider)
    {
        if (request('slider_status') == '0') {
            $slider->status = '1';
        } else if (request('slider_status') == '1') {
            $slider->status = '0';
        }
        $slider->save();
        return redirect(route('slider.index'));
    }

    public function filePondTemp(Request $request)
    {
        if($request->hasFile('file_name')){
            $file = $request->file('file_name');
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            if (file_exists(asset('storage/slider-image/'. $filenameWithExt )) ) {
                return null;
            } else {
                $path = $request->file('file_name')->storeAs('public/slider-image/', $filenameWithExt);
                return $filenameWithExt;
            }
        }
        return '';
    }
}
