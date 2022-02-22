@extends('admin.layouts.app')

@section('title', ' Slider')

@section('breadcrumb', 'Slider List')

@section('content')


<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Admin type list</h4>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><input type="checkbox" value="" checked=""></td>
                                    <td> Super Admin</td>
                                    <td>
                                        <div class="badge badge-success round">
                                            <i class="font-medium-2 icon-line-height feather icon-edit"></i>
                                        </div>
                                        <div class="badge badge-success round">
                                            <i class="font-medium-2 icon-line-height feather icon-trash-2"></i>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
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

@endsection

