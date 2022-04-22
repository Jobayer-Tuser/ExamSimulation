@extends('admin.layouts.app')

@section('title', ' Slider')

@section('breadcrumb', 'Slider List')

@section('button')
    <a href=" {{ route('slider.create') }} " type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </a>
@endsection

@section('content')

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slider list</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="min">Sl No.</th>
                                    <th>Group name</th>
                                    <th>Slider Type</th>
                                    <th>Title</th>
                                    <th>Sequence</th>
                                    <th>Status</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if (isset($sliders))
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td> {{ $n++ }}</td>
                                            <td>{{ $slider->sliderGroup->name }}</td>
                                            <td>{{ $slider->sliderGroup->slider_type }}</td>
                                            <td> <a href="{{ $slider->target_link }}" target="{{ $slider->target_type }}">{{ $slider->title }}</a>  </td>
                                            <td> {{ $slider->sequence }} </td>
                                            <td>
                                                <form action="{{ route('slider.status.update', $slider->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="slider_status" id="slider_status" value="{{ $slider->status }}" />
                                                    <button type="submit" class="btn btn-sm {{ $slider->status == '1' ? 'btn-success' : 'btn-light' }} ">{{ $slider->status == '1' ? 'Active' : 'Inactive' }}</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('slider.edit', $slider->id) }}" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </a>
                                                <button data-durl="{{ route('slider.destroy', $slider->id) }}" data-name="{{ $slider->title }}" data-toggle="modal" data-target="#deleteSlider" type="button" class="btn btn-danger btn-sm deleteSliderBtn"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Group name</th>
                                    <th>Slider Type</th>
                                    <th>Title</th>
                                    <th>Sequence</th>
                                    <th>Status</th>
                                    <th class="min">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade text-left" id="deleteSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form  class="deleteSliderForm" action="" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> <strong> Delete Slider </strong>  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Are you sure want to delete <strong class="sliderTitle"> </strong>!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
<script type="text/javascript">

    //delete admin type action
    $(document).on('click', '.deleteSliderBtn', function(e){
        let name    = $(this).data('name');
        let url     = $(this).data('durl');

        $('.sliderTitle').text(name);
        $('.deleteSliderForm').attr('action', url);
    })

</script>
@endpush

@endsection

