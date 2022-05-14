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
        for( $i = 0, $j = count(request('test_id')); $i < $j; $i++ ) {

            $question = Question::create([
                'category_id' => request('parent_category_id'),
                'test_id' => request('test_id')[$i],
                'details' => request('question_details'),
            ]);

            foreach( request('answer') as $key => $value ) {

                if ( ! empty($value['image_options_'. $key]) ){

                    $file = $value['image_options_'. $key];
                    $fileNameToSave = "ANSWER_". $file->getClientOriginalName();

                    if ( ! file_exists(public_path('storage/answer-image/'. $fileNameToSave )) ) {
                        $path =  $file->storeAs('storage/answer-image/', $fileNameToSave);
                    }
                }
                $answer = Answer::create([
                    'question_id' => $question->id,
                    'answer_type' => $value['answer_type_'. $key],
                    'text_answer' => $value['text_options_'. $key],
                    'image_answer' => $fileNameToSave,
                    'correct_answer' => $value['correct_answer_'. $key],
                ]);

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
        return $request;

        for( $i = 0, $j = count(request('test_id')); $i < $j; $i++ ) {

            $question = Question::where('id', $request->question_id)->get();
            $question->category_id = $request->parent_category_id;
            $question->test_id = $request->test_id[$i];
            $question->details = $request->question_details;
            $question->save();

            foreach( request('answer') as $key => $value ) {

                $answer = Answer::where('id', $value['answer_id_'. $key]);

                if ( ! empty($value['image_options_'. $key]) ){

                    $file = $value['image_options_'. $key];
                    $fileNameToSave = "ANSWER_". $file->getClientOriginalName();

                    $oldFile = public_path('storage/answer-image/'. $answer->image_answer );

                    if( file_exists($oldFile) ){
                        unlink($oldFile);

                        $storeNewFile =  $file->storeAs('public/answer-image/', $fileNameToSave);
                    }
                }
                $answer->question_id = $question->id;
                $answer->answer_type = $value['answer_type_'. $key];
                $answer->text_answer = $value['text_options_'. $key];
                $answer->image_answer = $fileNameToSave;
                $answer->correct_answer = $value['correct_answer_'. $key];
                $answer->save();

            }
        }

        return redirect(route('question.index'));
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
}
