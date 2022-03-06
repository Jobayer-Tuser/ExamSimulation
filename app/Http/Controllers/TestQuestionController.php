<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestQuestionRequest;
use App\Http\Requests\UpdateTestQuestionRequest;
use App\Models\TestQuestion;

class TestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.test.question');
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
     * @param  \App\Http\Requests\StoreTestQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestQuestionRequest  $request
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestQuestionRequest $request, TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestQuestion $testQuestion)
    {
        //
    }
}
