@extends('admin.layouts.app')
@section('title', 'Question Bank')
@section('breadcrumb', 'Question list')

@section('button')
    <button data-toggle="modal" data-target="#createQuestion" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Question list</h4>
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
                                    <th>Parent Category</th>
                                    <th>Question</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td> BCS </td>
                                    <td> Who is the prime miniter of bangldesh? </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#addAnswer" type="button" class="btn  btn-dark btn-sm"><i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add Answer </button>
                                        <button data-toggle="modal" data-target="#editQuestion" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
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


<!-- Careate Question Modal -->
<div class="modal fade text-left" id="createQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create Question </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category">Subcategory Category</label>
                                <select name="parent_category" class="custom-select block" id="parent_category">
                                    <option selected="">Select Category</option>
                                    <option value="BSC Exam">BSC Exam </option>
                                    <option value="PSC Exam"> PSC Exam</option>
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

<!-- Edit Question Modal -->
<div class="modal fade text-left" id="addAnswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Add Answer </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invoice-product-details">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 mb-1">
                                <fieldset class="form-group">
                                    <label for="answer">Answer</label>
                                    <input name="add_answer" type="text" class="form-control" id="add_answer"/>
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 mt-2">
                                <button type="button" class="btn  btn-dark btn-sm add_button">
                                    <i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add Answer
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 mb-1 field_wrapper" >

                            </div>
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

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper

        //Once add button is clicked
        $(addButton).click(function(){
            let filedValue = $('[name="add_answer"]').val();
            if ( filedValue !== ""){
                $('[name="correctAnswer"]').val(filedValue);
                var fieldHTML = `<fieldset class="checkbox correctAnswer"><label><input type="checkbox" name="correctAnswer[]" value="${filedValue}"> ${filedValue}</label></fieldset>`;
                $(wrapper).append(fieldHTML);
                $('input[name="add_answer"]').val("");
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
@endpush

@endsection

