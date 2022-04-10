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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('slider.store') }}" >
                            @csrf
                            <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="group_name">Group Name</label>
                                            <select name="group_id" class="custom-select block" id="group_name">
                                                <option selected="">Select Group Name</option>
                                                <option value="Full width">BSC Exam </option>
                                                <option value="Square"> PSC Exam</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="image_title">Image Title</label>
                                            <input name="title" type="text" class="form-control" id="image_title">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="image_title">Target Link</label>
                                            <input name="target_link" type="text" class="form-control" id="target_link">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="target_type">Targent Type</label>
                                            <select name="target_type" class="custom-select block" id="target_type">
                                                <option selected="">Select Target type</option>
                                                <option value="_blank">_blank </option>
                                                <option value="_self"> _self</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="sequence">Sequence</label>
                                            <input name="sequence" type="number" class="form-control" id="sequence">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="status">Slider Status</label>
                                            <select name="slider_status" class="custom-select block" id="slider_status">
                                                <option selected="">Select Status</option>
                                                <option value="1">Active </option>
                                                <option value="0"> Inactive</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <input type="file" class="filepond" name="file_name" multiple data-allow-reorder="true" data-max-file-size="2MB" data-max-files="3">
                                        </fieldset>
                                    </div>

                                <div class="float-right">
                                    <button type="submit" class="btn btn-success btn-min-width mr-1 mb-1 float-right"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->

@push('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush

@push('script')
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[name="file_name"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
</script>

@endpush

@endsection

