<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Answer;

class QuestionController extends Controller
{
    private $category;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->category = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->category->getAllCategories();
        $data['questions']  = Question::with('category')->select('id', 'details', 'category_id')->get();
        // $data['questions']  = DB::table(' ')->get();
        $data['tests']      = Test::select('id', 'name')->get();
        return view('admin.question.index', $data);
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
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        $data['answers'] = Answer::where('question_id', $question->id)->get();
        $data['categories'] = $this->category->getAllCategories();
        $data['question']  = $question;
        $data['tests']      = Test::select('id', 'name')->get();
        return view('admin.question.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function addAnswer(Request $request)
    {
        return $request;
    }
}
