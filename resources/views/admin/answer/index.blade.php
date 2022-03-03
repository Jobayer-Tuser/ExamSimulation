@extends('admin.layouts.app')

@section('title', 'Answer list')

@section('breadcrumb', 'Answer list')

@section('content')


<!-- Basic Elements start -->
<section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="question_name">Question name</label>
                                    <select name="question_name" class="custom-select block" id="question_name">
                                        <option selected="">Select Question</option>
                                        <option value="Full width"> Who is the prime minister of bangladesh? </option>
                                        <option value="Square"> PSC Exam</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="question_name">Answer</label>
                                    <input name="question_details" value="" type="text" class="form-control" id="question_details" />
                                </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="category_status">Answer Status</label>
                                    <select name="category_status" class="custom-select block" id="category_status">
                                        <option selected="">Select Status</option>
                                        <option value="1"> Active </option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
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
                                    <th>Parent Category</th>
                                    <th>Question</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><input type="checkbox" value="" checked=""></td>
                                    <td> BCS </td>
                                    <td> Who is the prime miniter of bangldesh? </td>
                                    <td>
                                        <div class="badge badge-warning round">
                                            <a data-toggle="modal" data-target="#large" href=""> <i class="font-medium-3 icon-line-height feather icon-edit"></i> </a>
                                        </div>
                                        <div class="badge badge-danger round">
                                            <i class="font-medium-3 icon-line-height feather icon-trash-2"></i>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Parent Category</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category">Question name</label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Question</option>
                                    <option value="Full width"> Who is the prime minister of bangladesh? </option>
                                    <option value="Square"> PSC Exam</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details">Question Details</label>
                                <textarea name="question_details" type="text" class="form-control" id="question_details">
                                    Who is the prime miniter of bangldesh?
                                </textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

