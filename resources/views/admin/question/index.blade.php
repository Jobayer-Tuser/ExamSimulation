@extends('admin.layouts.app')
@section('title', 'Question Bank')
@section('breadcrumb', 'Question list')

@section('button')
    <button data-toggle="modal" data-target="#createQuestion" type="button" class="btn-icon btn btn-secondary btn-round"><i class="fa fa-plus-circle"></i> Create new </button>
@endsection

@section('content')
<section class="basic-elements">
    <div class="row  mt-1">
        <form action="{{ route('answer.store') }}" method="POST">
            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Question and Answer</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row answerOptions">
                                <div class="col-xl-4 col-lg-6 col-md-4 mb-1">
                                    <fieldset class="form-group">
                                        <label for="parent_category">Select Category</label>
                                        <select name="parent_category_id" class="custom-select @error('parent_category_id') is-invalid @enderror" id="parent_category">
                                            <option selected="">Select Category</option>
                                            @if ( !empty($categories))
                                                @foreach ($categories as $category )
                                                    <option value="{{ $category->id }}" @if (old('parent_category_id') == $category->id) selected @endif > {{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        @error('parent_category_id')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>

                                </div>
                                <div class="col-xl-8 col-lg-6 col-md-8 mb-1">
                                    <fieldset class="form-group">
                                        <label for="question_details">Question Details</label>
                                        <input name="question_details" type="text" class="form-control @error('question_details') is-invalid @enderror" id="question_details" value="{{ old('question_details') }}" />

                                        @error('question_details')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <label for="add_anwer"><strong> Add Answer </strong></label>
                                    <hr/>
                                </div>
                                <div class="col-xl-8 col-lg-6 col-md-8 mb-1">
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-8 mb-1">
                                    <label for="answer_type">Answer Type</label>
                                </div>

                                <div class="col-xl-8 col-lg-6 col-md-8">
                                    <fieldset class="radio">
                                        <label>
                                            <input class="textAnswer @error('answer_type') is-invalid @enderror" checked type="radio" name="answer_type" value="Text"> Text
                                        </label>

                                        <label>
                                            <input class="imageAnswer @error('answer_type') is-invalid @enderror" type="radio" name="answer_type" value="Image"> Image
                                        </label>

                                        @error('answer_type')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-4">
                                </div>

                                <div class="col-xl-8 col-lg-6 col-md-8">
                                    <table class="table table-borderd">
                                        <thead>
                                            <tr>
                                                <th>Options</th>
                                                <th class="min">Is Correct</th>
                                                <th class="min">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="multipleOptions">
                                            <tr>
                                                <td>
                                                    <fieldset class="form-group">
                                                        <input name="text_options[]" type="text" class="form-control textOptions  @error('text_options') is-invalid @enderror" id="options"/>
                                                        <input id="pond1" type="file" class="filepond d-none imageOptions"
                                                            name="image_options[]"
                                                            data-allow-reorder="true"
                                                            data-max-file-size="2MB"
                                                            data-max-files="4"
                                                            accept="image/png, image/jpeg, image/jpg"
                                                        />
                                                        @error('text_options')
                                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </fieldset>
                                                </td>
                                                <td>
                                                    <fieldset class="form-group">
                                                        <label>
                                                            <input class="@error('correct_answer') is-invalid @enderror" type="checkbox" name="correct_answer[]" value="Yes"> Yes
                                                        </label>
                                                        <label>
                                                            <input class="@error('correct_answer') is-invalid @enderror" type="checkbox" name="correct_answer[]" value="No"> No
                                                        </label>
                                                    </fieldset>
                                                    @error('correct_answer')
                                                        <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-dark btn-sm addOptions">
                                                        <i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add More
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section id="configuration">
    <div class="row">
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
                                    <th class="min">Sl No.</th>
                                    <th>Parent Category</th>
                                    <th>Question</th>
                                    <th class="min" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                @if (!empty($questions))
                                    @foreach ( $questions as $question)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            {{-- <td> {{ $question->category->name }} </td> --}}
                                            <td>{{ $question->parent_category_id }}</td>
                                            <td> {{ $question->details }} </td>
                                            <td>
                                                <button data-toggle="modal" data-id="{{ $question->id }}" data-target="#addAnswer" type="button" class="btn  btn-dark btn-sm addAction"><i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add Answer </button>
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
                                    <th>Parent Category</th>
                                    <th>Category Name</th>
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
<div class="modal fade text-left" id="createQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('question.store') }}" method="POST">
            @csrf
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
                                <select name="parent_category_id" class="custom-select block" id="parent_category">
                                    <option selected="">Select Category</option>
                                    @if ( !empty($categories))
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details">Question Details</label>
                                <textarea name="details" type="text" class="form-control" id="question_details"></textarea>
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

<!-- Edit Question Modal -->
<div class="modal fade text-left" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" class="editQuestionForm">
            @csrf
            @method('PATCH')
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
                                <select name="parent_category_id" class="custom-select block" id="parent_category">
                                    <option selected="">Select Category</option>
                                    @if ( !empty($categories))
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="question_details">Question Details</label>
                                <textarea name="details" type="text" class="form-control" id="question_details">Who is the prime miniter of bangldesh?</textarea>
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

<!-- Edit Question Modal -->
<div class="modal fade text-left" id="addAnswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('answer.store') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" />
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
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $(document).ready(function() {

        var maxField = 5; //Input fields increment limitation
        var addButton = $('.addOptions'); //Add button selector
        var wrapper = $('.multipleOptions'); //Input field wrapper
        let optionCount = 1;

        //Once add button is clicked
        $(addButton).click(function(){
            let answerType = $("[name='answer_type']").val();
            optionCount++;
            var fieldHTML = `
                <tr id="row${optionCount}">
                    <td>
                        <fieldset class="form-group">
                            ${
                                ( answerType == "Image") ?
                                    `<input id="pond${optionCount}" type="file" class="filepond imageOptions" name="image_options[]" data-allow-reorder="true" data-max-file-size="2MB" data-max-files="4"/>`
                                    :
                                    `<input name="text_options[]" type="text" class="form-control textOptions" id="options"/>`
                            }
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="form-group">
                            <label>
                                <input type="checkbox" name="correct_answer[]" value="Yes"> Yes
                            </label>
                            <label>
                                <input type="checkbox" name="correct_answer[]" value="No"> No
                            </label>
                        </fieldset>
                    </td>
                    <td>
                        <button id="${optionCount}" type="button" class="btn btn-danger btn-sm removeOptions">
                            <i class="font-medium-1 icon-line-height feather icon-minus-circle"></i>
                        </button>
                    </td>
                </tr>
            `;
            $(wrapper).append(fieldHTML);

            let pondId = "pond" + optionCount;
            loadFilepond(pondId);
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.removeOptions', function(e){
            e.preventDefault();
            let buttonId = $(this).attr("id");
            $('#row' + buttonId + '').remove(); //Remove field html
        });

        $(document).on('click', '.imageAnswer', function(e) {
            $('tr[id*=row]').remove(); //delete all created content in this id
            $('[name="answer_type"]').val("Image");
            $('.imageOptions').removeClass("d-none");
            $('.textOptions').addClass('d-none');
        });

        $(document).on('click', '.textAnswer', function(e) {
            $('tr[id*=row]').remove();
            $('[name="answer_type"]').val("Text");
            $('.textOptions').removeClass("d-none");
            $('.imageOptions').addClass('d-none');
        });
    });
</script>

<script>
    loadFilepond('pond1');
    function loadFilepond( filePondId ){
        console.log('input#' + filePondId);
        let inputElement = document.querySelector('input#' + filePondId);
        FilePond.create(inputElement);
        FilePond.setOptions({
            allowMultiple: true,
            server: {
                url :  "{{ route('slider.file') }}",
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                }
            }
        })
    }

</script>
@endpush
@endsection