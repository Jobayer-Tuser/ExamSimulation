@extends('admin.layouts.app')
@section('title', 'Coupon list')
@section('breadcrumb', ' Coupon list')

@section('button')
    <button data-toggle="modal" data-target="#createCoupon" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Coupon List</h4>
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
                                    <th>Sl no.</th>
                                    <th>Coupon code</th>
                                    <th>Discount amount</th>
                                    <th>Total useable</th>
                                    <th>Discount start</th>
                                    <th>Discount end</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td> Spring2022 </td>
                                    <td> 120 tk </td>
                                    <td> 12 </td>
                                    <td> 02/03/2022 </td>
                                    <td> 15/ 03/ 2022 </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editCoupon" type="button" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                        <button data-toggle="modal" data-target="#deleteQuestion" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Coupon code</th>
                                    <th>Discount amount</th>
                                    <th>Total useable</th>
                                    <th>Discount start</th>
                                    <th>Discount end</th>
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
<div class="modal fade text-left" id="createCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <input name="coupon_code" type="text" class="form-control" id="coupon_code"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="dicount_type"> Discount type </label>
                                <select name="dicount_type" class="custom-select block" id="dicount_type">
                                    <option selected="">Select Type</option>
                                    <option value="percent">Percent % </option>
                                    <option value="taka">Taka</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_amount">Discount Amount</label>
                                <input name="discount_amount" type="text" class="form-control" id="discount_amount"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="total_usable"> Total Usable</label>
                                <input name="total_usable" type="number" class="form-control" id="total_usable"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="total_usable_by_person"> Total usable by person</label>
                                <input name="total_usable_by_person" type="number" class="form-control" id="total_usable_by_person"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_start"> Discount Start </label>
                                <input name="discount_start" type="date" class="form-control" id="discount_start"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_end"> Discount End </label>
                                <input name="discount_end" type="date" class="form-control" id="discount_end"/>
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

<!-- Edit Coupon Modal -->
<div class="modal fade text-left" id="editCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <input name="coupon_code" type="text" class="form-control" id="coupon_code"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="dicount_type"> Discount type </label>
                                <select name="dicount_type" class="custom-select block" id="dicount_type">
                                    <option selected="">Select Type</option>
                                    <option value="percent">Percent % </option>
                                    <option value="taka">Taka</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_amount">Discount Amount</label>
                                <input name="discount_amount" type="text" class="form-control" id="discount_amount"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="total_usable"> Total Usable</label>
                                <input name="total_usable" type="number" class="form-control" id="total_usable"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="total_usable_by_person"> Total usable by person</label>
                                <input name="total_usable_by_person" type="number" class="form-control" id="total_usable_by_person"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_start"> Discount Start </label>
                                <input name="discount_start" type="date" class="form-control" id="discount_start"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 mb-1">
                            <fieldset class="form-group">
                                <label for="discount_end"> Discount End </label>
                                <input name="discount_end" type="date" class="form-control" id="discount_end"/>
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

