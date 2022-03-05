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
                                        <button data-toggle="modal" data-target="#addAnswer" type="button" class="btn  btn-dark btn-sm"><i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add Answer </button>
                                        <button data-toggle="modal" data-target="#editQuestion" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
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
                    <div class="row">
                        <div class="invoice-product-details">
                            <form class="repeater-form">
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="mb-1">

                                        <div class="col-12 col-md-3 form-group item-cost">
                                            <input name="answer[]" type="text" class="form-control" value="24">
                                        </div>
                                        <div class="form-group">
                                            <button data-repeater-create class="btn btn-primary mt-1" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>

                                        <div class="row item-heading-titles mb-50">
                                            <div class="col-3 col-md-4 item-subtitle font-bold">Item</div>
                                            <div class="col-3 cost-subtitle font-bold">Cost</div>
                                        </div>
                                        <div class="repeater-controls d-flex">
                                            <div class="input-fields border border-light rounded p-1 d-flex">
                                                <div class="row invoice-item-controls d-flex">
                                                    <div class="col-12 col-md-4 form-group item-name">
                                                        <select class="form-control" id="item-options">
                                                            <option value="stack">Stack Admin template</option>
                                                            <option value="modern">Modern Admin template</option>
                                                            <option value="apex">Apex Admin template</option>
                                                            <option value="robust">Robust Admin template</option>
                                                            <option value="frest">Frest Admin template</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-3 form-group item-cost">
                                                        <input type="text" class="form-control" value="24">
                                                    </div>
                                                    <div class="col-12 col-md-3 form-group item-quantity">
                                                        <input type="text" class="form-control" value="1">
                                                    </div>
                                                    <div class="col-12 col-md-2 form-group item-price">
                                                        $24.00</div>
                                                    <div class="col-12 col-md-4 form-group item-description mb-0">
                                                        <input type="text" class="form-control description-input" value="The most developer friendly & highly customisable HTML5 Admin">
                                                    </div>
                                                    <div class="col-12 col-md-8 form-group discounts mb-0">
                                                        <div class='discount-element'>
                                                            <span class="title-text">Discount:</span>
                                                            <span class="discount-value">0%</span>
                                                            <span class="tax-1-value mx-1">0%</span>
                                                            <span class="tax-2-value mx-1">0%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="delete-and-discount-config h-100 ml-50 d-flex flex-column justify-content-between">
                                                    <span class="cursor-pointer d-flex justify-content-center align-items-center">
                                                        <i class="fa fa-times-circle-o font-size-increase" data-repeater-delete></i>
                                                    </span>
                                                    <div class="dropdown d-flex justify-content-center align-items-center">
                                                        <span role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cog font-size-increase m-0"></i>
                                                        </span>
                                                        <div class="dropdown-menu p-1 dropdown-sizing" aria-labelledby="dropdownMenuButton">
                                                            <div class="row invoice-taxes-controls">
                                                                <div class="col-12 form-group">
                                                                    <label for="discount">Discount(%)</label>
                                                                    <input type="number" class="form-control" id="applicable-discount" placeholder="0">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="tax1">Tax1</label>
                                                                    <select name="tax-val-1" class="form-control stopPropgate" id="applicable-tax1">
                                                                        <option value="1%" selected="">1%</option>
                                                                        <option value="10%">10%</option>
                                                                        <option value="18%">18%</option>
                                                                        <option value="40%">40%</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="tax2">Tax2</label>
                                                                    <select name="tax-val-2" class="form-control stopPropgate" id="applicable-tax2">
                                                                        <option value="1%" selected="">1%</option>
                                                                        <option value="10%">10%</option>
                                                                        <option value="18%">18%</option>
                                                                        <option value="40%">40%</option>
                                                                    </select>
                                                                </div>
                                                                <hr>
                                                                <div class="col-12 buttons d-flex justify-content-between mt-1">
                                                                    <button type="button" class="btn btn-primary discount-apply-btn">Apply</button>
                                                                    <button type="button" class="btn btn-light cancel-btn">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button data-repeater-create class="btn btn-primary mt-1" type="button">
                                        <i class="fa fa-plus"></i> Add Button
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success"> Add </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('css')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
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

