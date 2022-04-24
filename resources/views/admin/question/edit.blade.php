@extends('admin.layouts.app')
@section('title', 'Question Bank')
@section('breadcrumb', 'Question list')

@section('content')
<section class="basic-elements">
    <div class="row  mt-1">
        <form action="{{ route('answer.update', $answer->id) }}" method="POST">
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
            server: {
                url :  "{{ route('answer.image.upload') }}",
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                }
            }
        })
    }

</script>
@endpush
@endsection