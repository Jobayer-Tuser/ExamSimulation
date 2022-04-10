@extends('admin.layouts.app')
@section('title', 'Admin list')
@section('breadcrumb', 'Admin List')

@section('button')
    <button data-toggle="modal" data-target="#createAdmin" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection
@section('content')

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Admin list</h4>
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
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($admins) )
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td> {{ $n++ }} </td>
                                            <td> {{ $admin->name }}  </td>
                                            <td> {{ $admin->email }} </td>
                                            <td></td>
                                            {{-- <td> {{ $admin->admintype->name }} </td> --}}
                                            <td> {{ $admin->status }} </td>
                                            <td>
                                                <button  data-url="{{ route('admin.update', $admin->id) }}"  data-typeid="{{ $admin->admin_type_id }}" data-id="{{ $admin->id }}" data-name="{{ $admin->name }}" data-email="{{ $admin->email }}" data-status="{{ $admin->status }}" data-toggle="modal" data-target="#editAdmin" type="button" class="btn  btn-warning btn-sm editAdminBtn"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                <button  data-url="{{ route('admin.destroy', $admin->id) }}" data-name="{{ $admin->name }}" data-toggle="modal" data-target="#deleteAdmin" type="button" class="btn btn-danger btn-sm deleteAdminBtn"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
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
<div class="modal fade text-left" id="createAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Add New Admin </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Name</label>
                                <input name="name" type="text" class="form-control" id="admin_name" required />
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Email</label>
                                <input name="email" type="email" class="form-control" id="admin_email" required />
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Password</label>
                                <input name="password" type="password" class="form-control" id="admin_pass" required />
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="admintype">Select type</label>
                                <select name="admin_type_id" class="custom-select block" id="admin_type" required >
                                    <option value="" selected>Select</option>
                                    @if (!empty($admintypes))
                                        @foreach ($admintypes as $admintype )
                                            <option value="{{ $admintype->id }}"> {{ $admintype->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="adminstatus">Select status</label>
                                <select name="status" class="custom-select block" id="admin_status" required>
                                    <option value="1"selected="">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
<div class="modal fade text-left" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" class="editAdminForm">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Edit Admin </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Name</label>
                                <input name="name" type="text" class="form-control adminName" id="admin_name" required />
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Email</label>
                                <input name="email" type="email" class="form-control adminEmail" id="admin_email" required />
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="admintype">Select type</label>
                                <select name="admin_type_id" class="custom-select block adminType" id="admin_type" required >
                                    <option value="" selected>Select</option>
                                    @if (!empty($admintypes))
                                        @foreach ($admintypes as $admintype )
                                            <option value="{{ $admintype->id }}"> {{ $admintype->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="adminstatus">Select status</label>
                                <select name="status" class="custom-select block adminStatus" id="admin_status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-warning">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form class="deleteAdminForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> <strong> Delete Admin </strong>  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Are you sure want to delete <strong class="adminText"> </strong> ! </h5>
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
        $(document).on('click', '.editAdminBtn', function(e){
            let name    = $(this).data('name');
            let email    = $(this).data('email');
            let admintype   = $(this).data('typeid');
            let status    = $(this).data('status');
            let url     = $(this).data('url');

            $(".adminName").val(name);
            $(".adminEmail").val(email);
            ( status == 'Active' ? $(".adminStatus").val(1).change() : $(".adminStatus").val(0).change() );
            $(".adminType").val(admintype).change();
            $(".editAdminForm").attr('action', url);
        });

        //delete admin type action
        $(document).on('click', '.deleteAdminBtn', function(e){
            let name    = $(this).data('name');
            let url     = $(this).data('url');

            $('.adminText').text(name);
            $('.deleteAdminForm').attr('action', url);
        })

    });
</script>

@endpush

@endsection

