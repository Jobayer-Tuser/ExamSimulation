@extends('admin.layouts.app')
@section('title', 'Page')
@section('breadcrumb', 'All Page')

@section('button')
    <button data-toggle="modal" data-target="#createPage" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
<section id="configuration">
    <div class="row mt-1">
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
                                    <th>Sl No.</th>
                                    <th>Page Title</th>
                                    <th>Page url</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> Home Page </td>
                                    <td> <a href="//exmasimulation.test/home" target="_blank" rel="noopener noreferrer">exmasimulation.test/home</a>   </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editPage" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Page Title</th>
                                    <th>Page url</th>
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

<!-- Create Page Modal -->
<div class="modal fade text-left" id="createPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create Page </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="pages_url"> Pages URL</label>
                                <input name="pages_url" type="text" class="form-control" id="pages_url"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_title"> Page Title </label>
                                <input name="page_title" type="text" class="form-control" id="page_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_status"> Page Status </label>
                                <select name="page_status" class="custom-select block" id="page_status">
                                    <option selected="">Select Type</option>
                                    <option value="1"> Active </option>
                                    <option value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="page_content"> Page Content</label>
                                <textarea name="page_content" type="text" class="form-control" id="page_content"> </textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Page Modal -->
<div class="modal fade text-left" id="editPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create Page </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="pages_url"> Pages URL</label>
                                <input name="pages_url" type="text" class="form-control" id="pages_url"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_title"> Page Title </label>
                                <input name="page_title" type="text" class="form-control" id="page_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_status"> Page Status </label>
                                <select name="page_status" class="custom-select block" id="page_status">
                                    <option selected="">Select Type</option>
                                    <option value="1"> Active </option>
                                    <option value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="page_content"> Page Content</label>
                                <textarea name="page_content" type="text" class="form-control" id="page_content"> </textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

