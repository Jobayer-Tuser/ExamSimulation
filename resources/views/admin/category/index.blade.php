@extends('admin.layouts.app')

@section('title', ' Category List')

@section('breadcrumb', 'Category list')

@section('button')
    <button data-toggle="modal" data-target="#createCategory" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')

<section id="configuration">
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category list</h4>
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

                                    <th>Category</th>
                                    <th>Status</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($categories))
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td> {{ $n++ }}</td>
                                            <td>
                                                {{ isset($category->allParentCategory->allParentCategory->allParentCategory) ? $category->allParentCategory->allParentCategory->allParentCategory->name . " > " : null }}
                                                {{ isset($category->allParentCategory->allParentCategory) ? $category->allParentCategory->allParentCategory->name . " > " : null }}
                                                {{ isset($category->allParentCategory) ? $category->allParentCategory->name . " > " : null }}
                                                {{ $category->name }}
                                            </td>

                                            <td> <div class="badge badge-glow badge-pill {{ ($category->status == 'Active' ? 'badge-success' : 'badge-secondary') }}" >{{  $category->status  }} </div></td>
                                            <td>
                                                <button data-toggle="modal"
                                                    data-url="{{ route('category.update', $category->id) }}"
                                                    data-parentid="{{ $category->parent_category_id }}"
                                                    data-name="{{  $category->name  }}"
                                                    data-status="{{ $category->status }}"
                                                    data-target="#editCategory"
                                                    type="button" class="btn btn-warning btn-sm editCategoryBtn">
                                                    <i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit
                                                </button>
                                                <button data-toggle="modal" data-target="#deleteCategory" type="button" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>

                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th class="min">Action</th>
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
<div class="modal fade text-left" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Create Category </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category">Parent Category</label>
                                <select name="parent_category_id" class="custom-select block" id="parent_category">
                                    <option value="" selected="">Select Category</option>
                                    @if (!empty($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="category_name">Category Name</label>
                                <input name="name" type="text" class="form-control" id="category_name" />
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="category_status">Category Status</label>
                                <select name="status" class="custom-select block" id="category_status" />
                                    <option selected="">Select Status</option>
                                    <option value="1"> Active </option>
                                    <option value="0"> Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="POST" class="categoryEditForm">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> Edit Category </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="parent_category">Parent Category</label>
                                <select name="parent_category_id" class="custom-select block" id="parent_category">
                                    <option value="" selected="">Select Category</option>
                                    @if (!empty($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="category_name">Category Name</label>
                                <input name="name" type="text" class="form-control" id="category_name" required/>
                            </fieldset>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="category_status">Category Status</label>
                                <select name="status" class="custom-select block" id="category_status" required >
                                    <option value="" selected="">Select Status</option>
                                    <option value="1"> Active </option>
                                    <option value="0"> Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function(){
            //edit admin type action
            $(document).on('click', '.editCategoryBtn', function(e){
                let pageEditUrl     = $(this).data('url');
                let parentCatId     = $(this).data('parentid');
                let pageTitle       = $(this).data('name');
                let pageStatus      = $(this).data('status');
                console.log(parentCatId);


                $('[name="parent_category_id"]').val(parentCatId).change();
                $('[name="name"]').val(pageTitle);
                ( pageStatus == 'Active' ? $('[name="status"]').val(1).change() : $('[name="status"]').val(0).change() );
                $(".categoryEditForm").attr('action', pageEditUrl);
            });
        });
    </script>
@endpush
@endsection

