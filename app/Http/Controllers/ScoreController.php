<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use App\Models\ScoreDetail;
use Illuminate\Http\Request;
use Validator;

class ScoreController extends Controller
{
    // Get Student Scores
    public function index($categoryId)
    {
        $scores = Score::where('category_id', $categoryId)
                        ->where('user_id', auth()->user()->id)
                        ->orderBy('score', 'desc')
                        ->get();

        foreach ($scores as $score) {
            $score->student = auth()->user();
            $score->details = Score::getScoreDetails($score->category_id, $score->id)['details'];
        }

        return response([
            'message' => 'Scores retreived.',
            'data' => [
                'scores' => $scores,
            ]
        ], 200);
    }

    // Get Score Details Details
    public function show($categoryId, $id)
    {
        $score = Score::getScoreDetails($categoryId, $id);

        return response([
            'message' => 'Score retreived.',
            'data' => [
                'score_details' => $score,
            ]
        ], 200);
    }

    // Insert Score
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'category_id' => 'required',
            'score' => 'required',
            'total_items' => 'required',
            'percentage' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $input['user_id'] = auth()->user()->id;
        $score = Score::create($input);

        $details = $request->details;
        foreach ($details as $data) {
            $scoreDetail = [
                'score_id' => $score->id,
                'number' => $data['number'],
                'question_id' => $data['question_id'],
                'answer_id' => $data['answer_id'],
                'is_correct' => $data['is_correct']
            ];

            ScoreDetail::create($scoreDetail);
        }

        return response([
            'message' => 'Score Saved',
            'data' => [
                'score' => $score
            ]
        ], 200);
    }
}


