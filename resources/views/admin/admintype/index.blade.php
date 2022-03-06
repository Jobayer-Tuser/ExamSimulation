@extends('admin.layouts.app')
@section('title', 'Admin type list')
@section('breadcrumb', 'Admin type')

@section('button')
    <button data-toggle="modal" data-target="#createAdminType" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@push('css')
<style>
    th.sorting_asc {
        max-width: 100px !important;
    }

</style>
@endpush

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
                                        <th>Sl No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td> Super Admin</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editAdminType" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                            <button data-toggle="modal" data-target="#deleteAdminType" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Name</th>
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
        <form action="">
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
                                <input name="admin_type" type="text" class="form-control" id="admin_type">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="editAdminType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-default" role="document">
        <form action="">
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
                                <input name="admin_type" value="Super Admin" type="text" class="form-control" id="admin_type">
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
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> <strong> Delete admin type </strong>  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5> Are you sure want to delete <strong>Super Admin</strong> type !</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-success" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection