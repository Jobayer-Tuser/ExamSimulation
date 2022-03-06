@extends('admin.layouts.app')
@section('title', 'All Test Question')
@section('breadcrumb', ' All Question List')

{{-- @section('button')
    <button data-toggle="modal" data-target="#createTestQuestion" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection --}}


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
                                    <th>Test Name </th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> 1 </td>
                                    <td> BCS </td>
                                    <td> Who is the prime miniter of bangldesh? </td>
                                    <td> Sheikh Hasina </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editQuestion" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Test Name </th>
                                    <th>Question</th>
                                    <th>Answer</th>
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

<!-- Careate Question Modal -->
<div class="modal fade text-left" id="createTestQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create New Test </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category"> Test Name </label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Test</option>
                                    <option value="BSC Exam">BSC Exam </option>
                                    <option value="PSC Exam"> PSC Exam</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details">Question name</label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Question</option>
                                    <option value="BSC Exam">BSC Exam </option>
                                    <option value="PSC Exam"> PSC Exam</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details"> Answer</label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Question</option>
                                    <option value="BSC Exam">BSC Exam </option>
                                    <option value="PSC Exam"> PSC Exam</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection