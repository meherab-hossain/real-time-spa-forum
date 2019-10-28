<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $question=Question::latest()->get();
        return QuestionResource::collection($question);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       // auth()->user()->questions()->create($request->all());
        Question::create($request->all());
    }

    public function show(Question $question)
    {
        return new  QuestionResource($question);
    }


    public function edit(Question $question)
    {
        //
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
    }


    public function destroy(Question $question)
    {
        $question->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
