@extends('admin.layouts.app')

@section('title', 'Admin list')

@section('breadcrumb', 'Admin List')

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
                                    <label for="basicInput">Name</label>
                                    <input name="admin_name" type="text" class="form-control" id="admin_name">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput">Email</label>
                                    <input name="admin_email" type="email" class="form-control" id="admin_email">
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="admintype">Select admin type</label>
                                    <select name="admin_type" class="custom-select block" id="admin_type">
                                        <option selected="">Open this select menu</option>
                                        <option value="Admin">Admin</option>
                                        <option value="2">Super Admin</option>
                                        <option value="3">Manager</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="admintype">Select Admin type</label>
                                    <select name="admin_type" class="custom-select block" id="admin_type">
                                        <option value="1"selected="">Active</option>
                                        <option value="0">Inactive</option>

                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mt-2">
                                <button type="submit" class="btn btn-success btn-min-width mr-1 mb-1"><i class="fa fa-check"></i> Success</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->

<section id="configuration">
    <div class="row">
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
                                    <th><input type="checkbox" value="" checked=""></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" value="" checked=""></td>
                                    <td> Nirjhor Anjum  </td>
                                    <td> niirjhor.anjum@gmail.com </td>
                                    <td> Active </td>
                                    <td> Super Admin </td>
                                    <td>
                                        <div class="badge badge-success round">
                                            <a data-toggle="modal" data-target="#large" href=""><i class="font-medium-2 icon-line-height feather icon-edit"></i></a>
                                        </div>
                                        <div class="badge badge-success round">
                                            <i class="font-medium-2 icon-line-height feather icon-trash-2"></i>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" value="" checked=""></td>
                                    <td> Jobayer Al Mahmud  </td>
                                    <td> Jobayer.tuser@gmail.com </td>
                                    <td> Active </td>
                                    <td> Admin </td>
                                    <td>
                                        <div class="badge badge-success round">
                                            <a data-toggle="modal" data-target="#large" href=""><i class="font-medium-2 icon-line-height feather icon-edit"></i></a>
                                        </div>
                                        <div class="badge badge-success round">
                                            <i class="font-medium-2 icon-line-height feather icon-trash-2"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" value="" checked=""></td>
                                    <td> Sifuzzaman Saif  </td>
                                    <td> saif@gmail.com </td>
                                    <td> Active </td>
                                    <td> Manager </td>
                                    <td>
                                        <div class="badge badge-success round">
                                            <a data-toggle="modal" data-target="#large" href=""><i class="font-medium-2 icon-line-height feather icon-edit"></i></a>
                                        </div>
                                        <div class="badge badge-success round">
                                            <i class="font-medium-2 icon-line-height feather icon-trash-2"></i>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" value="" checked=""></th>
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
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
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
                                <input name="admin_name" type="text" class="form-control" id="admin_name">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">Email</label>
                                <input name="admin_email" type="email" class="form-control" id="admin_email">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="admintype">Select admin type</label>
                                <select name="admin_type" class="custom-select block" id="admin_type">
                                    <option selected="">Open this select menu</option>
                                    <option value="Admin">Admin</option>
                                    <option value="2">Super Admin</option>
                                    <option value="3">Manager</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="admintype">Select Admin type</label>
                                <select name="admin_type" class="custom-select block" id="admin_type">
                                    <option value="1"selected="">Active</option>
                                    <option value="0">Inactive</option>

                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
