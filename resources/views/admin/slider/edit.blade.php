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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('slider.update', $slider->id) }}" >
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                                        <fieldset class="form-group">
                                            <label for="group_name">Group Name</label>
                                            <select name="slider_group_id" class="custom-select block @error('group_id') is-invalid @enderror" id="group_name">
                                                <option selected=""> Select Group Name </option>
                                                @if (!empty($sliderGroups))
                                                    @foreach ($sliderGroups as $group )
                                                        <option value="{{ $group->id }}" @if ( $slider->slider_group_id == $group->id) selected @endif > {{ $group->name }} </option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('group_id')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-4">
                                        <fieldset class="form-group">
                                            <label for="image_title">Image Title</label>
                                            <input name="title" value="{{ $slider->title }}" type="text" class="form-control @error('title') is-invalid @enderror" id="image_title">

                                            @error('title')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <fieldset class="form-group">
                                            <label for="target_link">Target Link</label>
                                            <input name="target_link" value=" {{ $slider->target_link }}" type="text" class="form-control @error('target_link') is-invalid @enderror" id="target_link">

                                            @error('target_link')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <fieldset class="form-group">
                                            <label for="target_type">Targent Type</label>
                                            <select name="target_type" class="custom-select block @error('target_type') is-invalid @enderror" id="target_type">
                                                <option selected="">Select Target type</option>
                                                <option {{ $slider->target_type == '_blank' ? 'selected' : '' }} value="_blank">_blank </option>
                                                <option {{ $slider->target_type == '_self' ? 'selected' : '' }} value="_self"> _self</option>
                                            </select>

                                            @error('target_type')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <fieldset class="form-group">
                                            <label for="sequence">Sequence</label>
                                            <input name="sequence" type="number" value="{{ $slider->sequence }}" class="form-control @error('sequence') is-invalid @enderror" id="sequence">

                                            @error('sequence')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <fieldset class="form-group">
                                            <label for="status">Slider Status</label>
                                            <select name="status" class="custom-select block @error('slider_status') is-invalid @enderror" id="slider_status">
                                                <option selected="">Select Status</option>
                                                <option {{ $slider->status == '1' ? 'selected' : '' }} value="1">Active </option>
                                                <option {{ $slider->status == '0' ? 'selected' : '' }}  value="0"> Inactive</option>
                                            </select>

                                            @error('slider_status')
                                                <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                            <input type="file" class="filepond"
                                            name="file_name"
                                            allowImagePreview="true"
                                            imagePreviewHeight="50"
                                            data-allow-reorder="true"
                                            data-max-file-size="2MB"
                                            data-max-files="4" />
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
@push('script')
<script>

    $existingFilePath = "{{ asset('storage/slider-image/'. $slider->file_name) }}";
    // Get a reference to the file input element
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
    );
    const inputElement = document.querySelector('input[name="file_name"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {
        files: [
            {
                // the server file reference
                source:  $existingFilePath,
            }
        ]
    });

    FilePond.setOptions({
        server: {
            // url :  "{{ route('slider.file') }}",
            headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            process: {
                url: "{{ route('slider.file') }}",
            },
            revert: {
                url: "{{ route('slider.image.delete') }}",
            }
        },
    });

    if ( $existingFilePath == null ) {
    }


</script>

@endpush

@endsection

