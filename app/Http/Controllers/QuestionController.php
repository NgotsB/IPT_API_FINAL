<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Validator;

class QuestionController extends Controller
{

    // Get Questions
    public function index(Request $request)
    {
        $query = Question::where('content', 'LIKE', '%' . $request->search . '%');

        if (empty($query)) {
            return response([
                'message' => 'Questions not found.',
            ], 404);
        }

        $questions = $query->inRandomOrder()->paginate(10);

        foreach ($questions as $question) {
            $question->answer = Answer::getAnswers($question->id);
            $question->category = Category::getCategory($question->id);
        }

        return response([
            'message' => 'Questions have been retrieved.',
            'data' => [
                'questions' => $questions
            ]
        ], 200);
    }


    // Get Question Details
    public function show($id)
    {
        $question = Question::find($id);

        $question->answers = Answer::getAnswers($question->id);
        $question->category = Category::getCategory($question->id);

        return response([
            'message' => 'Question retreived.',
            'data' => [
                'question' => $question,
            ]
        ], 200);
    }


    // Add Question
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'content' => 'required',
            'category_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $question = Question::create($input);

        return response([
            'message' => 'Question created.',
            'data' => [
                'question' => $question
            ]
        ], 200);
    }

    // Update Question Details
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'content' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $question = Question::find($id);
        $question->content = $input['content'];
        $question->save();

        return response([
            'message' => 'Question updated.',
            'data' => [
                'question' => $question
            ]
        ], 200);
    }

    // Delete Question
    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();

        return response([
            'message' => 'Question deleted.',
        ], 200);
    }
}
