@extends('admin.layouts.app')
@section('title', 'SEO page list')
@section('breadcrumb', 'SEO page list')

@section('button')
    <button data-toggle="modal" data-target="#seoCreate" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
<section id="configuration">
    <div class="row mt-1    ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Seo page list</h4>
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
                                    <th>Page ID</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keywords</th>
                                    <th>Meta Description</th>
                                    <th class="min">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if ( !empty($seos) )
                                    @foreach ($seos as $seo)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td> {{ $seo->page_id }}</td>
                                            <td> {{ $seo->meta_title }} </td>
                                            <td> {{ $seo->meta_keyword }} </td>
                                            <td> {{ $seo->meta_description }} </td>
                                            <td>
                                                <button
                                                    data-eurl="{{ route('seo.update', $seo->id) }}"
                                                    data-id="{{ $seo->page_id }}"
                                                    data-title="{{ $seo->meta_title }}"
                                                    data-keyword="{{ $seo->meta_keyword }}"
                                                    data-description="{{ $seo->meta_description }}"
                                                    data-toggle="modal"
                                                    data-target="#seoEdit"
                                                    type="button" class="btn btn-warning btn-sm editSEOButton">
                                                    <i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit
                                                </button>
                                                <form class="d-flex" method="POST" action="{{ route('seo.destroy', $seo->id) }}">
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
                                    <th>Page ID</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keywords</th>
                                    <th>Meta Description</th>
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
<div class="modal fade text-left" id="seoCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('seo.store') }}" method="POST">
            @csrf
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
                                <select name="page_id" class="custom-select block" id="pages_id">
                                    <option value="" selected > Select Type </option>
                                    @if ( !empty($pages) )
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"> {{ $page->title }} </option>
                                        @endforeach
                                    @endif
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
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit SEO Modal -->
<div class="modal fade text-left" id="seoEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="POST" class="editSEOForm" >
            @csrf
            @method('PATCH')
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
                                <select name="page_id" class="custom-select block" id="pages_id">
                                    <option value="" selected=""> Select Type </option>
                                    @if ( !empty($pages) )
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"> {{ $page->title }} </option>
                                        @endforeach
                                    @endif
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
            $(document).on('click', '.editSEOButton', function(e){
                let pageEditUrl     = $(this).data('eurl');
                let pageId          = $(this).data('id');
                let pageTitle       = $(this).data('title');
                let pageKeyword     = $(this).data('keyword');
                let pageDescription = $(this).data('description');

                $('[name="meta_title"]').val(pageTitle);
                $('[name="meta_keyword"]').val(pageKeyword);
                $('[name="meta_description"]').val(pageDescription);
                $('[name="page_id"]').val(pageId).change();
                $(".editSEOForm").attr('action', pageEditUrl);
            });
        });
    </script>
@endpush
@endsection

