<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Validator;

class AnswerController extends Controller
{

    // Add Answer
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'question_id' => 'required',
            'content' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $answer = Answer::create($input);

        return response([
            'message' => 'Answer created.',
            'data' => [
                'answer' => $answer
            ]
        ], 200);
    }

    // Set correct answer
    public function setCorrectAnswer(Request $request, $id)
    {
        $isSet = Answer::where('question_id', $request->question_id)->update(['is_correct' => 0]);

        if (!$isSet) {
            return response(['message' => 'Failed to set as correct answer.'], 204);
        }

        $correctAnswer = Answer::findOrFail($id);
        $correctAnswer->is_correct = 1;
        $correctAnswer->save();

        return response([
            'message' => 'Set as correct answer.',
            'data' => [
                'correct_answer' => $correctAnswer
            ]
        ], 200);
    }


    // Delete Question
    public function delete($id)
    {
        $answer = Answer::find($id);
        $answer->delete();

        return response([
            'message' => 'Answer deleted.',
        ], 200);
    }
}
