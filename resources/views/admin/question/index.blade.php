@extends('admin.layouts.app')
@section('title', 'Question Bank')
@section('breadcrumb', 'Question list')

@section('content')
<section class="basic-elements">
    <div class="row  mt-1">
        <form action="{{ route('answer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Question and Answer</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row answerOptions">
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="parent_category">Select Category</label>
                                        <select name="parent_category_id" class="custom-select @error('parent_category_id') is-invalid @enderror" id="parent_category">
                                            <option selected="">Select Category</option>
                                            @if ( !empty($categories))

                                                @foreach ($categories as $category )

                                                @php
                                                $var = $category->cat_name . ' > ' . $category->subcat_name .' > ' .$category->sscat_name . ' > ' .$category->ssscat_name

                                                @endphp
                                                    {{-- @dump($category) --}}

                                                    {{-- <option value="{{ $category->cat_id }}" @if (old('parent_category_id') == $category->id) selected @endif > --}}
                                                    <option value=""> {{ preg_replace('/^ > /', '', $var); }} </option>
                                                @endforeach
                                            @endif
                                        </select>

                                        @error('parent_category_id')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="test_id">Test name</label> <br/>
                                        @if ( !empty($tests))
                                            @foreach ($tests as $test )
                                                <input type="checkbox" name="test_id[]" value="{{ $test->id }}" class=" ml-1 @error('test_id') is-invalid @enderror" /> {{ $test->name }}
                                            @endforeach
                                        @endif

                                        @error('test_id')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <fieldset class="form-group">
                                        <label for="question_details">Question Title</label>
                                        <input name="question_details" type="text" class="form-control @error('question_details') is-invalid @enderror" id="question_details" value="{{ old('question_details') }}" />

                                        @error('question_details')
                                            <span class="text-danger"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </fieldset>
                                </div>

                                <div class="col-xl-8 col-lg-6 col-md-8">
                                    <strong>Add Answer</strong>
                                </div>
                                <div class="col-xl-11 col-lg-11 col-md-11">
                                    <table class="table table-borderd">
                                        <thead>
                                            <tr>
                                                <th>Options</th>
                                                <th class="min">Answer type</th>
                                                <th class="min">Correct Answer</th>
                                                <th class="min">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="multipleOptions">
                                            <tr>
                                                <td>
                                                    <fieldset class="form-group">
                                                        <input id="textOption1" name="answer[1][text_options_1]" type="text" class="form-control textOptions" />
                                                        <input id="imageOption1" name="answer[1][image_options_1]" type="file" class="form-control imageOptions d-none" accept="image/png, image/jpeg, image/jpg" />
                                                    </fieldset>
                                                </td>
                                                <td>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input id="1" class="textAnswer @error('answer_type') is-invalid @enderror" checked type="radio" name="answer[1][answer_type_1]" value="Text"> Text
                                                        </label>

                                                        <label>
                                                            <input id="1" class="imageAnswer @error('answer_type') is-invalid @enderror" type="radio" name="answer[1][answer_type_1]" value="Image"> Image
                                                        </label>
                                                    </fieldset>
                                                </td>
                                                <td>
                                                    <fieldset class="form-group">
                                                        <label>
                                                            <input class="@error('correct_answer') is-invalid @enderror" type="radio" name="answer[1][correct_answer_1]" value="Yes"> Yes
                                                        </label>
                                                        <label>
                                                            <input class="@error('correct_answer') is-invalid @enderror" type="radio" name="answer[1][correct_answer_1]" value="No"> No
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
                            <button type="submit" class="btn btn-outline-success float-right mb-2">Save</button>
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
                        <ul class="list-inline mb-1">
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
                                            {{-- @dump($question) --}}
                                            <td>{{ isset($question->category->name) ?? $question->category->name }}</td>
                                            <td> {{ $question->details }} </td>
                                            <td>
                                                <a href="{{ route('question.edit', $question->id) }}" class="btn  btn-warning btn-sm"><i class="font-medium-1 icon-line-height feather icon-edit"></i> Edit </a>
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

@push('script')
<script type="text/javascript">
    $(document).ready( function() {

        var addButton = $('.addOptions'); //Add button selector
        var wrapper = $('.multipleOptions'); //Input field wrapper
        let optionCount = 1;

        //Once add button is clicked
        $(addButton).click( function() {
            optionCount++;
            var fieldHTML = `
                <tr id="row${optionCount}">
                    <td>
                        <fieldset class="form-group">
                            <input id="textOption${optionCount}" name="answer[${optionCount}][text_options_${optionCount}]" type="text" class="form-control textOptions" />
                            <input id="imageOption${optionCount}" name="answer[${optionCount}][image_options_${optionCount}]" type="file" class="form-control d-none imageOptions" accept="image/png, image/jpeg, image/jpg" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="radio">
                            <label>
                                <input id="${optionCount}" class="textAnswer" checked type="radio" name="answer[${optionCount}][answer_type_${optionCount}]" value="Text"> Text
                            </label>
                            <label>
                                <input id="${optionCount}" class="imageAnswer" type="radio" name="answer[${optionCount}][answer_type_${optionCount}]" value="Image"> Image
                            </label>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="form-group">
                            <label>
                                <input type="radio" name="answer[${optionCount}][correct_answer_${optionCount}]" value="Yes"> Yes
                            </label>
                            <label>
                                <input type="radio" name="answer[${optionCount}][correct_answer_${optionCount}]" value="No"> No
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
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.removeOptions', function(e){
            e.preventDefault();
            let buttonId = $(this).attr("id");
            $('#row' + buttonId).remove();
        });

        $(document).on('click', '.imageAnswer', function(e) {
            let optionsId = $(this).attr("id");
            $('#imageOption' + optionsId).removeClass("d-none");
            $('#textOption' + optionsId).addClass('d-none');
        });

        $(document).on('click', '.textAnswer', function(e) {
            let optionsId = $(this).attr("id");
            $('#textOption' + optionsId).removeClass('d-none');
            $('#imageOption' + optionsId).addClass("d-none");
        });
    });


</script>
@endpush
@endsection