<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Category;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.answer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        $request->validated();

        // return $request;
        if (request('answer_type') == 'Image') {

            $question = Question::create([
                'category_id' => request('parent_category_id'),
                'details' => request('question_details'),
            ]);

            if( is_array(request('image_options')) && is_array(request('correct_answer')) ) {
                for( $i = 0, $j = count(request('image_options')); $i < $j ; $i++) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_type' => request('answer_type'),
                        'text_answer' => request('image_options')[$i],
                        'correct_answer' => request('correct_answer')[$i],
                    ]);
                }
            }
        }

        if(request('answer_type') == 'Text') {
            $question = Question::create([
                'category_id' => request('parent_category_id'),
                'details' => request('question_details'),
            ]);

            if( is_array(request('text_options')) && is_array(request('correct_answer')) ) {
                for( $i = 0, $j = count(request('text_options')); $i < $j ; $i++) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_type' => request('answer_type'),
                        'text_answer' => request('text_options')[$i],
                        'correct_answer' => request('correct_answer')[$i],
                    ]);
                }
            }
        }
        return redirect(route('question.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $data['categories'] = Category::with('parentCategory')->select('id', 'name', 'status', 'parent_category_id')->get();
        // $data['question']  = Question::with('category')->select('id', 'details', 'category_id')->get();
        return $data['answer']  = $answer;
        // $data['answers'] =
        return view('admin.question.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }

    public function imageAnswerUpload(Request $request)
    {
        if($request->hasFile('image_options')){
            $file = $request->file('image_options');
            $filenameWithExt = $request->file('image_options')[0]->getClientOriginalName();

            if ( ! file_exists(public_path('storage/question-image/'. $filenameWithExt )) ) {
                $path = $request->file('image_options')[0]->storeAs('public/question-image/', $filenameWithExt);
                return $filenameWithExt;
            }
            return null;
        }
    }
}
