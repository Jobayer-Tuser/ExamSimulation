@extends('admin.layouts.app')

@section('title', ' Create Slider')

@section('breadcrumb', 'Slider Create')

@section('content')


 <!-- Basic Elements start -->
 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="group_name">Group Name</label>
                                    <select name="group_name" class="custom-select block" id="group_name">
                                        <option selected="">Select Group Name</option>
                                        <option value="Full width">BSC Exam </option>
                                        <option value="Square"> PSC Exam</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="image_title">Image Title</label>
                                    <input name="image_title" type="text" class="form-control" id="image_title">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="image_title">Target Link</label>
                                    <input name="target_link" type="text" class="form-control" id="target_link">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="target_type">Targent Type</label>
                                    <select name="target_type" class="custom-select block" id="target_type">
                                        <option selected="">Select Target type</option>
                                        <option value="_blank">_blank </option>
                                        <option value="_self"> _self</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input name="full_name" type="text" class="form-control" id="full_name">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="sequence">Sequence</label>
                                    <input name="sequence" type="text" class="form-control" id="sequence">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="slider_status">Slider Status</label>
                                    <select name="slider_status" class="custom-select block" id="slider_status">
                                        <option selected="">Select Status</option>
                                        <option value="1">Active </option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mt-2">
                                <button type="button" class="btn btn-success btn-min-width mr-1 mb-1"><i class="fa fa-check"></i> Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->


@endsection

