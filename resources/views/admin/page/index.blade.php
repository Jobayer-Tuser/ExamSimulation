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
                    <h4 class="card-title">Pages list</h4>
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
                                    <th>Page Title</th>
                                    <th>Page url</th>
                                    <th>Page Status</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($pages) )
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td> {{ $page->title }} </td>
                                            <td> <a href="{{ $page->url }}" target="_blank" rel="noopener noreferrer">{{ $page->url }}</a></td>
                                            <td> <span class="badge {{ ($page->status == 'Active' ? 'badge-success' : 'badge-dark') }}">{{  $page->status  }} </span></td>
                                            <td>
                                                <button data-eurl="{{ route('page.update', $page->id) }}" data-status="{{ $page->status }}"  data-ttl="{{ $page->title }}" data-cont="{{ $page->content }}" data-purl="{{ $page->url }}" data-toggle="modal" data-target="#editPage" type="button" class="btn btn-warning btn-sm editPageButton"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </button>
                                                <form class="d-flex" method="POST" action="{{ route('page.destroy', $page->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="font-medium-1 icon-line-height feather icon-trash-2"></i> Delete </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Page Title</th>
                                    <th>Page url</th>
                                    <th>Page Status</th>
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

<!-- Create Page Modal -->
<div class="modal fade text-left" id="createPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('page.store') }}" method="POST">
            @csrf
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
                                <input name="url" type="text" class="form-control" id="pages_url"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_title"> Page Title </label>
                                <input name="title" type="text" class="form-control" id="page_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_status"> Page Status </label>
                                <select name="status" class="custom-select block" id="page_status">
                                    <option selected="">Select Type</option>
                                    <option value="1"> Active </option>
                                    <option value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="content"> Page Content</label>
                                <textarea name="content" type="text" class="form-control" id="page_content"> </textarea>
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

<!-- Edit Page Modal -->
<div class="modal fade text-left" id="editPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" class="editPageForm" >
            @csrf
            @method('PATCH')
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
                                <input name="url" type="text" class="form-control" id="page_url"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_title"> Page Title </label>
                                <input name="title" type="text" class="form-control" id="page_title"/>
                            </fieldset>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 mb-1">
                            <fieldset class="form-group">
                                <label for="page_status"> Page Status </label>
                                <select name="status" class="custom-select block" id="page_status">
                                    <option selected="">Select Type</option>
                                    <option value="1"> Active </option>
                                    <option value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="page_content"> Page Content</label>
                                <textarea name="content" type="text" class="form-control" id="page_content"> </textarea>
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
        $(document).on('click', '.editPageButton', function(e){
            let pageTitle   = $(this).data('ttl');
            let pageContent = $(this).data('cont');
            let pageUrl     = $(this).data('purl');
            let pageStatus  = $(this).data('status');
            let pageEditUrl = $(this).data('eurl');

            $('[name="title"]').val(pageTitle);
            $('[name="content"]').val(pageContent);
            $('[name="url"]').val(pageUrl);
            ( pageStatus == 'Active' ? $('[name="status"]').val(1).change() : $('[name="status"]').val(0).change() );
            $(".editPageForm").attr('action', pageEditUrl);
        });
    });
</script>

@endpush

@endsection

