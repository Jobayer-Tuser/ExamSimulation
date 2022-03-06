@extends('admin.layouts.app')
@section('title', 'SEO')
@section('breadcrumb', 'SEO')

@section('button')
    <button data-toggle="modal" data-target="#seoCreate" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
<section id="configuration">
    <div class="row mt-1    ">
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
                                    <th>Page ID</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keywords</th>
                                    <th>Meta Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>12</td>
                                    <td> Hello title will be here </td>
                                    <td> title, course, description </td>
                                    <td> Here will come meta description </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#seoEdit" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Page ID</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keywords</th>
                                    <th>Meta Description</th>
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
<div class="modal fade text-left" id="seoCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-page"> SEO </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page-id"> Pages ID</label>
                                <select name="pages_id" class="custom-select block" id="pages_id">
                                    <option selected=""> Select Type </option>
                                    <option value="1"> Home Page </option>
                                    <option value="0"> About Page </option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_title"> Meta Title </label>
                                <input name="meta_title" type="text" class="form-control" id="meta_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_keyword"> Mega Keyword </label>
                                <input name="meta_keyword" type="text" class="form-control" id="meta_keyword"/>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_description"> Meta Description </label>
                                <textarea name="meta_description" type="text" class="form-control" id="meta_description"> </textarea>
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

<!-- Edit SEO Modal -->
<div class="modal fade text-left" id="seoEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="create-page"> SEO </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page-id"> Pages ID</label>
                                <select name="pages_id" class="custom-select block" id="pages_id">
                                    <option selected=""> Select Type </option>
                                    <option value="1"> Home Page </option>
                                    <option value="0"> About Page </option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_title"> Meta Title </label>
                                <input name="meta_title" type="text" class="form-control" id="meta_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_keyword"> Mega Keyword </label>
                                <input name="meta_keyword" type="text" class="form-control" id="meta_keyword"/>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="meta_description"> Meta Description </label>
                                <textarea name="meta_description" type="text" class="form-control" id="meta_description"> </textarea>
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

