@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Products</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 28</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                        <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>New Users</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 1,238</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                        <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>New Orders</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-down"></i> 4,658</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success bg-darken-2">
                        <i class="icon-wallet font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Total Profit</h5>
                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 5.6 M</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Stats -->

<!--Product sale & buyers -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products Sales</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="products-sales" class="height-300"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Buyers</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content px-1">
                <div id="recent-buyers" class="media-list height-300 position-relative">
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$1,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-away avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$2,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-busy avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-9.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Linda Olson <span class="font-medium-4 float-right pt-1">$1,112</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span> <span class="badge badge-success ml-1">Office</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Roy Clark <span class="font-medium-4 float-right pt-1">$2,815</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-warning">Decor</span> <span class="badge badge-danger ml-1">Appliances</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-11.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$2,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <div class="avatar avatar-away avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-12.png" alt="Generic placeholder image">
                                <i></i>
                            </div>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$1,321</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Product sale & buyers -->

@endsection

