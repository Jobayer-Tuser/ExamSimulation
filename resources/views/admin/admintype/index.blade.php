@extends('admin.layouts.app')
@section('title', 'Admin type list')
@section('breadcrumb', 'Admin type')

@section('button')
    <button data-toggle="modal" data-target="#createAdminType" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
    <section id="configuration">
        <div class="row mt-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admin types</h4>
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
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th class="min">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $n = 1 @endphp
                                    @if ( !empty($admin) )
                                        @foreach( $admin as $each )
                                            <tr>
                                                <td> {{ $n++ }}</td>
                                                <td> {{ $each->name }} </td>
                                                <td> {{ ($each->created_at)->diffForHumans(); }} </td>
                                                <td> {{ ($each->updated_at)->diffForHumans(); }} </td>
                                                <td>
                                                    <button data-url="{{ route('admintype.update', $each->id) }}" data-name="{{ $each->name }}" data-eid="{{ $each->id }}" data-toggle="modal" data-target="#editAdminType" type="button" class="btn  btn-warning btn-sm editAdminBtn"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                    <button data-url="{{ route('admintype.destroy', $each->id) }}" data-name="{{ $each->name }}" data-did="{{ $each->id }}" data-toggle="modal" data-target="#deleteAdminType" type="button" class="btn btn-danger btn-sm deleteAdminBtn"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
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
<div class="modal fade text-left" id="createAdminType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form action="{{ route('admintype.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create new admin type </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <fieldset class="form-group">
                                <label for="admin_type"> Name </label>
                                <input name="name" type="text" class="form-control" id="admin_type" required>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-success">Save </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="editAdminType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form method="POST" class="editAdminTypeForm">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Edit admin type </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <fieldset class="form-group">
                                <label for="admin_type">Admin Type</label>
                                <input name="name" value="" type="text" class="form-control adminType" id="admin_type">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="deleteAdminType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form method="POST" class="deleteAdminTypeForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> <strong> Delete admin type </strong>  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Are you sure want to delete <strong class="showAdminType"></strong> type !</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- <div class="btn btn-outline-primary toast-toggler">Toast</div>

<div class="toast fade hide" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header">
        <img src="../../../app-assets/images/ico/favicon-32.png" class="rounded mr-2" alt="Toast image">
        <strong class="mr-auto">Stack Admin</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div> --}}

@push('script')
<script>
    $(document).ready(function(){

        //edit admin type action
        $(document).on('click', '.editAdminBtn', function(e){
            let name    = $(this).data('name');
            let url     = $(this).data('url');

            $(".adminType").val(name);
            $(".editAdminTypeForm").attr('action', url);
        });

        //delete admin type action
        $(document).on('click', '.deleteAdminBtn', function(e){
            let name    = $(this).data('name');
            let url     = $(this).data('url');

            $('.showAdminType').text(name);
            $('.deleteAdminTypeForm').attr('action', url);
        })

    });
</script>

@endpush

@endsection