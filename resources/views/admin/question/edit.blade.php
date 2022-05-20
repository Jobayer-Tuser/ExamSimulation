@extends('admin.layouts.app')
@section('title', 'Edit Question & Answer')
@section('breadcrumb', 'Edit Question & Answer')

@section('content')
<section class="basic-elements">
    <div class="row  mt-1">
        <form action="{{ route('answer.update', $question->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="question_id" value="{{ $question->id }}" />
            @method('PATCH')
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
                                            <option value="" selected="">Select Category</option>
                                            @if ( !empty($categories))
                                                @foreach ( $categories as $category)
                                                <option value="2">
                                                    {{
                                                        $category->cat_name . ' > ' .
                                                        $category->subcat_name .' > ' .
                                                        $category->sscat_name . ' > ' .
                                                        $category->ssscat_name
                                                    }}
                                                </option>
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
                                                <input {{ $test->id == $question->test_id ? 'checked' : '' }} type="checkbox" name="test_id[]" value="{{ $test->id }}" class=" ml-1 @error('test_id') is-invalid @enderror" /> {{ $test->name }}
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
                                        <input name="question_details" type="text" class="form-control @error('question_details') is-invalid @enderror" id="question_details" value="{{ $question->details ?? old('question_details') }}" />

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
                                            @if ( !empty($answers) )
                                                @foreach ( $answers as $key => $answer )
                                                <input type="hidden" name="answer[{{ $key }}][answer_id_{{ $key }}]" value="{{ $answer->id }}">
                                                    <tr id="row{{ $key }}">
                                                        <td>
                                                            <fieldset class="form-group">
                                                                <input id="textOption{{ $key }}" value="{{ $answer->text_answer }}" name="answer[{{ $key }}][text_options_{{ $key }}]" type="text" class="form-control textOptions" />
                                                                <input id="imageOption{{ $key }}" value="{{ asset('public/answer-image/'. $answer->image_answer) }}" name="answer[{{ $key }}][image_options_{{ $key }}]" type="file" class="form-control d-none imageOptions" accept="image/png, image/jpeg, image/jpg"  />
                                                            </fieldset>
                                                        </td>
                                                        <td>
                                                            <fieldset class="radio">
                                                                <label>
                                                                    <input id="{{ $key }}" class="textAnswer" {{ $answer->answer_type == 'Text' ? 'checked' : '' }} type="radio" name="answer[{{ $key }}][answer_type_{{ $key }}]" value="Text"  /> Text
                                                                </label>
                                                                <label>
                                                                    <input id="{{ $key }}" class="imageAnswer" {{ $answer->answer_type == 'Image' ? 'checked' : '' }} type="radio" name="answer[{{ $key }}][answer_type_{{ $key }}]" value="Image"  /> Image
                                                                </label>
                                                            </fieldset>
                                                        </td>
                                                        <td>
                                                            <fieldset class="form-group">
                                                                <label>
                                                                    <input type="radio" {{ $answer->correct_answer == 'Yes' ? 'checked' : '' }}  name="answer[{{ $key }}][correct_answer_{{ $key }}]" value="Yes"  /> Yes
                                                                </label>
                                                                <label>
                                                                    <input type="radio" {{ $answer->correct_answer == 'No' ? 'checked' : '' }} name="answer[{{ $key }}][correct_answer_{{ $key }}]" value="No"  /> No
                                                                </label>
                                                            </fieldset>
                                                        </td>
                                                        <td>
                                                            @if ( $key == 0 )
                                                            <button type="button" class="btn btn-dark btn-sm addOptions">
                                                                    <i class="font-medium-1 icon-line-height feather icon-plus-circle"></i> Add More
                                                                </button>
                                                            @else
                                                                <button id="{{ $key }}" type="button" class="btn btn-danger btn-sm removeOptions">
                                                                    <i class="font-medium-1 icon-line-height feather icon-minus-circle"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success float-right mb-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@push('script')
<script type="text/javascript">
    $(document).ready( function() {

        var addButton = $('.addOptions'); //Add button selector
        var wrapper = $('.multipleOptions'); //Input field wrapper
        let optionCount = $('.removeOptions').val();

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