@extends('admin.layouts.app')
@section('title', 'All Test Bank')
@section('breadcrumb', ' Test list ')

@section('button')
    <button data-toggle="modal" data-target="#createTest" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')

<section class="basic-elements">
    <div class="row  mt-1">
        <form action="{{ route('test.store') }}" method="POST">
            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Question and Answer</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <fieldset class="form-group">
                                        <label for="test_name"> Test Name </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="test_name" />

                                        @error('name')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 mt-2">
                                    <button type="submit" class="btn btn-outline-success float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All test list</h4>
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
                                    <th>Test Name </th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if (!empty($tests))
                                    @foreach ($tests as $test)
                                        <tr>
                                            <td> {{ $n++ }} </td>
                                            <td> {{ $test->name }} </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#editQuestion" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Test Name </th>
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
<div class="modal fade text-left" id="createTest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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

<!-- Edit Question Modal -->
<div class="modal fade text-left" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Edit Question </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category">Parent Category</label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Category</option>
                                    <option value="Full width">BSC Exam </option>
                                    <option value="Square"> PSC Exam</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details">Question Details</label>
                                <textarea name="question_details" type="text" class="form-control" id="question_details">Who is the prime miniter of bangldesh?</textarea>
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

