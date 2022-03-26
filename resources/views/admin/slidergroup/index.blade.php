@extends('admin.layouts.app')
@section('title', ' Slider Group')
@section('breadcrumb', 'Slider group')

@section('button')
    <button data-toggle="modal" data-target="#createSliderGroup" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slider Groups</h4>
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
                                    <th>Slider type</th>
                                    <th>Group Name</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($sliderGroups) )
                                    @foreach ($sliderGroups as $eachGroup)
                                        <tr>
                                            <td> {{ $n++ }} </td>
                                            <td> {{ $eachGroup->slider_type }}</td>
                                            <td> {{ $eachGroup->name }}</td>
                                            <td>
                                                <button data-eurl="{{ route('slidergroup.update', $eachGroup->id) }}" data-name="{{ $eachGroup->name }}" data-sltype="{{ $eachGroup->slider_type }}" data-toggle="modal" data-target="#editSliderGroup" type="button" class="btn  btn-warning btn-sm editBtn"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                <button data-durl="{{ route('slidergroup.destroy', $eachGroup->id) }}" data-name="{{ $eachGroup->name }}" data-toggle="modal" data-target="#deleteSliderGroup" type="button" class="btn btn-danger btn-sm deleteBtn"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Slider type</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
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
<div class="modal fade text-left" id="createSliderGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('slidergroup.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create Slider group </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="adminType">Slider Type</label>
                                <select name="slider_type" class="custom-select block" id="admin_type">
                                    <option value="" selected="">Select type</option>
                                    <option value="Full width">Full Width</option>
                                    <option value="Square"> Square</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="adminType">Group Name</label>
                                <input name="name" type="text" class="form-control" id="admin_type" />
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="editSliderGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="editSliderGroupForm" action="" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Edit Slider group </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="sliderType">Slider Type</label>
                                <select name="slider_type" class="custom-select block" id="slider_type">
                                    <option value="" >Select type</option>
                                    <option value="Full width">Full Width</option>
                                    <option value="Square"> Square</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="group_name">Group Name</label>
                                <input name="name" type="text" class="form-control" id="group_name" value="">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="deleteSliderGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form class="deleteSliderGroupForm" action="" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> <strong> Delete Slider group </strong>  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Are you sure want to delete <strong class="sliderText"> </strong> !</h5>
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
<script>
    $(document).ready(function(){

        //edit admin type action
        $(document).on('click', '.editBtn', function(e){
            let name    = $(this).data('name');
            let sliderType    = $(this).data('sltype');
            let url = $(this).data('eurl');

            $("[name='name']").val(name);
            $('[name="slider_type"]').val(sliderType).change();
            $(".editSliderGroupForm").attr('action', url);
        });

        //delete admin type action
        $(document).on('click', '.deleteBtn', function(e){
            let name    = $(this).data('name');
            let sliderType    = $(this).data('sltype');
            let url = $(this).data('durl');

            $('.sliderText').text(name);
            $('.deleteSliderGroupForm').attr('action', url);
        })

    });
</script>

@endpush

@endsection

